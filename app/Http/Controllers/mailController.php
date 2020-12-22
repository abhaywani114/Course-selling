<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Mail;
use DB;
use \Auth;

class mailController extends Controller
{
	public function sendContactForm(Request $request) {
		
			$validator = Validator::make($request->all(),[
                "first_name"		=> 'required',
                "last_name"		=> 'required',
                "email" 	=> ['required','email'],
                "message" 	=> 'required'
			]);

			if ($validator->fails()) {
				return response()->json(array(
					'success' => false,
					'errors' => $validator->getMessageBag()->toArray()
				), 400);
			}


		    $data = $request->validate([
                "first_name" => ['required'],
                "last_name"	=>	 ['required'],
                "email" => ['required','email'],
                "message" => ['required'],
        	]);
			 
			Mail::send('email.contact_support',compact('data') , function($message) use ($data) {
			   $sub = $data['subject'] ?? '';
			   $message->from('support@frcsmockexam.com', 'Support' );
			   $message->to(env('MAIL_FROM_ADDRESS'))->subject("$sub | Contact Request");
			});

		return ['status' =>	true];
	}

	public function sendCourseMail(Request $request) {


		$emails = DB::table('payment')->
			join('payment_course','payment_course.payment_id','payment.id')->
			join('users', 'payment.user_id', 'users.id')->
			where([
				'payment_course.course_id'	=> $request->course_id,
				'payment.status'			=> 'success'
			])->
			select('users.email')->
			get()->pluck('email')->toArray();

		$subject = $request->subject;
		$body	= $request->body;
		
		DB::table('course_notification')->insert([
			'subject'		=>	$subject,
			'msg'			=>	nl2br($body),
			'course_id'		=>	$request->course_id,
			"updated_at"	=>	now(),
			"created_at"	=>	now()
		]);

        Mail::send('email.course_notification', compact('body'), function($message) use ($emails, $subject){
           $message->from('support@frcsmockexam.com');
           $message->to($emails)->
           subject($subject);
       });

		return ['success' => true,"msg" => "Email sent"];
	}

	public function sendInvoice($tx_id) {

		$courses =	DB::table('courses')->limit(1)->get();
		 $payment  = DB::table('payment')->
		 	join('payment_course','payment.id','payment_course.payment_id')->
		 	where('payment.transaction_id', $tx_id)->
		 	first();

		Mail::send('email.course_invoice', compact('courses', 'payment','tx_id'), function($message) use ($tx_id, $payment) {
           $message->from('support@frcsmockexam.com');
           $message->to($payment->email, $payment->name)->
           subject("Invoice | $tx_id");
       });

		$courses =	DB::table('courses')->first();
		Mail::send('email.course_reg', compact('courses', 'payment','tx_id'), function($message) use ($tx_id, $payment) {
           $message->from('support@frcsmockexam.com');
           $message->to(env('MAIL_FROM_ADDRESS'))->
           subject("Payment Recv | $tx_id");
       });
	}

	public function sendResetPassword($email, $password) {
		Mail::send('email.reset_password', compact('email', 'password'), function($message) use ($email) {
           $message->from('support@frcsmockexam.com');
           $message->to($email)->
           subject("Reset Password");
       });	
	}
}
