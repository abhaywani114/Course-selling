<?php

namespace App\Http\Controllers;

use Omnipay\Omnipay;
use Illuminate\Http\Request;
use \Exception;
use \Log;
use DB;
use \Auth;

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
    		
    		if (empty(Auth::User())) {
				return response()->json(array(
					'success' => false,
					'errors' => ["Please login first"]
				), 400);
    		}

    		$cart = json_decode($request->productsInCart, true);
    		$tx_id = strtoupper(substr(preg_replace("/[^a-zA-Z0-9]+/", "",  base64_encode(random_bytes(16))), 0, 16));

            if (empty($cart)) {
                return response()->json(array(
                    'success' => false,
                    'errors' => ["Your cart is empty. PLease add some courses to your cart to checkout."]
                ), 400);
            }

            $is_any_null = DB::table('courses')->whereIn('id', array_map(function($f) {
                return $f['id'];                
                }, $cart) )->where('available_seats', 0)->get();

            if ($is_any_null->count() > 0) {
                $error_array = $is_any_null->pluck('name')->toArray();
                array_unshift($error_array, "0 Seats avaliable for Courses:");
                return response()->json(array(
                    'success' => false,
                    'errors' => $error_array
                ), 400);
            }

    		$payment_id = DB::table('payment')->insertGetId([
    			"transaction_id"	=>	$tx_id,
    			"user_id"			=>	Auth::User()->id,
				"updated_at"		=> 	now(),
				"created_at"		=>	now()
    		]);

    		$total = 0;
    		foreach ($cart as $c) {
    			$course = DB::table('courses')->find($c['id']);
    			DB::table('payment_course')->insert([
    				"payment_id"	=>	$payment_id,
    				"course_id"		=>	$course->id,
    				"price"			=>	$course->price,
    				"updated_at"	=> 	now(),
    				"created_at"	=>	now()
    			]);
    			$total += $course->price;
    		}

    		

           $response = $this->gateway->purchase(array(
                'amount' => $total,
                'name' => Auth::User()->name,
                'email' => Auth::User()->email,
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
               abort(403);
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

                $course_ids = DB::table('courses')->
                    join('payment_course','payment_course.course_id', 'courses.id')->
                    join('payment','payment.id','payment_course.payment_id')->
                    where('payment.transaction_id', $request->tx_id)->
                    select('courses.*')->get()->pluck('id')->toArray();

                DB::table('courses')->
                    whereIn('id', $course_ids)->decrement('available_seats',1);

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

     	return view("admin.payment_status", compact('status','errMsg'));
        
    }  

    public function view_payment() {
    	$data = DB::table('payment')->
    		join('payment_course','payment_course.payment_id','payment.id')->
    		leftjoin('courses','courses.id','payment_course.course_id')->
    		leftjoin('users','users.id','payment.user_id')->
    		orderBy("payment.created_at",'desc')->
    		select("payment.*",'courses.name as course_name', 'users.name as username',
    			DB::RAW("SUM(payment_course.price) as course_price"))->
            groupBy('payment.transaction_id')->
    		get();

    	return view('admin.view_payment', compact('data'));
    }
}
