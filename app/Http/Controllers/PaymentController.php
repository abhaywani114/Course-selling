<?php

namespace App\Http\Controllers;

use Omnipay\Omnipay;
use Illuminate\Http\Request;
use \Exception;
use \Log;
use DB;
use \Auth;
use \Validator;

class PaymentController extends Controller
{
     public $gateway;
    
    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false); //set it to 'false' when go live
    }

    public function checkout(Request $request) {
    	try { 		
    		
            $validator = Validator::make($request->all(),[
                "email"         =>  "required",
                "type"          =>  "required",
                "country"       =>  "required",
            ]);
   
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 400);
            } 

    		$tx_id = strtoupper(
                substr(preg_replace("/[^a-zA-Z0-9]+/", "",  
                    base64_encode(random_bytes(16))), 0, 16));

    		$payment_id = DB::table('payment')->insertGetId([
    			"transaction_id"	=>	$tx_id,
				"updated_at"		=> 	now(),
				"created_at"		=>	now()
    		]);

			$course = DB::table('courses')->first();
            
            if ($request->type == 'participant')
                $price  = $course->participant_price;
            elseif ($request->type == 'observer')
                $price  = $course->observer_price;

			DB::table('payment_course')->insert([
				"payment_id"	=>	$payment_id,
                "booking_date"  =>  $request->booking_date,
                "name"          =>  $request->fname ." ".  $request->sname,
                "email"         =>  $request->email,
                "phone_no"      =>  $request->mobile,
                "hospital"      =>  $request->hospital,
                "country"       =>  $request->country,
                "intrest"       =>  '',
                "type"          =>  $request->type,
				"price"			=>	$price,
				"updated_at"	=> 	now(),
				"created_at"	=>	now()
			]);

           $response = $this->gateway->purchase(array(
                'amount' => $price,
                'name' => "$request->fname $request->sname",
                'email' => $request->email,
                'currency' => env('CURRENCY_CODE'),
                'returnUrl' => route('payment_response',$tx_id),
                'cancelUrl' => route('payment_response', $tx_id),
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                return $response->getMessage();
            }

    	} catch (Exception $e) {

			Log::info([
				"Error"	=>	$e->getMessage(),
				"File"	=>	$e->getFile(),
				"Line"	=>	$e->getLine()
			]);

			$return = ["success" => false, "error"	=>	$e->getMessage()];
    	}

    	return $return;
    }

      public function response(Request $request) {
    
       $check_if_processed = DB::table('payment')->
           where([
               'transaction_id' => $request->tx_id,
            ])->
           orWhere('payment_id', $request->input('paymentId') ?? '0000')->
           first();
         

        if (!empty($check_if_processed)) {
            if ($check_if_processed->status != 'pending') {
         //    abort(403);
            }
        } else {
          abort(404);
        }

        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));

            $response = $transaction->send();
            if ($response->isSuccessful()) {
                 DB::table('payment')->
                    where('transaction_id', $request->tx_id)->
                    update([
                        'status' => "success",
                        'payment_id' =>$request->input('paymentId'),
                        "updated_at" => now()
                    ]);

                $course_ids = DB::table('courses')->first()->id;
                
                $payment_course_ = DB::table('payment_course')->
                    where('payment_id',$check_if_processed->id )->first();

                if ($payment_course_->type == 'participant') {
                  DB::table('courses')->
                    where('id', $course_ids)->decrement('available_seats',1);
                }

               app('App\Http\Controllers\mailController')->sendInvoice($request->tx_id);
                $status = 'success';
                $errMsg = "";
            }  else {
                 $status = 'failed';
                $errMsg = $response->getMessage() ?? "Payment failed";
            }

        } else {
             $status = 'failed';
             $errMsg = "Payment canceled";
        }

        if ( $status == 'failed') {
            DB::table('payment')->
                where('transaction_id',$request->tx_id)->
                update([
                    'status' => "failed", 
                    "note" => $errMsg ?? '',
                    "updated_at" => now()
            ]);
        }

     	return view("admin.payment_status", compact('status','errMsg','payment_course_'));
        
    }  

    public function view_payment() {
    	$data = DB::table('payment')->
    		join('payment_course','payment_course.payment_id','payment.id')->
    		get();

    	return view('admin.view_payment', compact('data'));
    }
}
