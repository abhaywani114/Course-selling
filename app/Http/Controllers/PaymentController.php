<?php

namespace App\Http\Controllers;

use Softon\Indipay\Facades\Indipay; 
use Illuminate\Http\Request;
use \Exception;
use \Log;
use DB;
use \Auth;

class PaymentController extends Controller
{
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

    		 $parameters = [
		        'transaction_no' => $tx_id,
		        'amount' => $total,
		        'name' => Auth::User()->name,
		        'email' => Auth::User()->email
		      ];

		      $order = Indipay::prepare($parameters);
		      return Indipay::process($order);
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
        // For default Gateway
        $response = Indipay::response($request);
        // For Otherthan Default Gateway
        
        $check_if_processed = DB::table('payment')->
           where([
                'transaction_id' => $response['transaction_no'],
                'status' => "success"
            ])->first();

        if (!empty($check_if_processed)) {
            abort(403);
        }

        if ($response['transaction_status'] == 'success' && $response['status'] == 'success') {
        	
        	DB::table('payment')->
	        	where('transaction_id', $response['transaction_no'])->
	        	update([
	        		'status' => "success",
	        	 	"updated_at" => now()
	        	]);

            $course_ids = DB::table('courses')->
                join('payment_course','payment_course.course_id', 'courses.id')->
                join('payment','payment.id','payment_course.payment_id')->
                where('payment.transaction_id', $response['transaction_no'])->
                select('courses.*')->get()->pluck('id')->toArray();

            DB::table('courses')->
                whereIn('id', $course_ids)->decrement('available_seats',1);

            app('App\Http\Controllers\mailController')->sendInvoice($response['transaction_no']);

	        $status = 'success';
        } else {
        	DB::table('payment')->
	        	where('transaction_id', $response['transaction_no'])->
	        	update([
	        		'status' => "failed", 
	        		"note" => $response['failure_reason'],
	        		"updated_at" => now()
	        ]);
	        $status = 'failed';
        }
     	return view("admin.payment_status", compact('status', 'response'));
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
