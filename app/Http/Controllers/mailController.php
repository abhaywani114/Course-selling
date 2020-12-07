<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use \Auth;

class mailController extends Controller
{
	public function sendContactForm(Request $request) {
		    
		    $data = $request->validate([
                "fname"=> ['required'],
                "lname"	=>	 ['required'],
                "email" => ['required','email'],
                "subject" => ['required'],
                "message" => ['required'],
        	]);
			
			Mail::send('email.contact_support',compact('data') , function($message) use ($data) {
			   $sub = $data['subject'];
			   $message->from($data['email'], $data['fname'] );
			   $message->to(env('MAIL_FROM_ADDRESS'),'Support')->subject("$sub | Contact Request");
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
           $message->from(env('MAIL_FROM_ADDRESS'));
           $message->to($emails)->
           subject($subject);
       });

		return ['success' => true,"msg" => "Email sent"];
	}

	public function sendInvoice($tx_id) {
		$courses =	DB::table('courses')->
		                join('payment_course','payment_course.course_id', 'courses.id')->
		                join('payment','payment.id','payment_course.payment_id')->
		                where('payment.transaction_id', $tx_id)->
		                select('courses.*')->get();

		 $user  = DB::table('users')->
		 	join('payment','payment.user_id','users.id')->
		 	where('payment.transaction_id', $tx_id)->
		 	select('users.*')->
		 	first();

		Mail::send('email.course_invoice', compact('courses', 'tx_id'), function($message) use ($tx_id, $user) {
           $message->from(env('MAIL_FROM_ADDRESS'));
           $message->to($user->email, $user->name)->
           subject("Invoice | $tx_id");
       });
	}

	public function sendResetPassword($email, $password) {
		Mail::send('email.reset_password', compact('email', 'password'), function($message) use ($email) {
           $message->from(env('MAIL_FROM_ADDRESS'));
           $message->to($email)->
           subject("Reset Password");
       });	
	}
}
