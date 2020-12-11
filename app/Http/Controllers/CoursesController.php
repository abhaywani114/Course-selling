<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use Log;
use Auth;

class CoursesController extends Controller
{
	function newCourse(Request $request) {
		try {
	
			$validator = Validator::make($request->all(),[
				"name"				=>	"required|min:5",
				"date"				=>	"required",
				'reg_time'			=>	"required",
				"zoom_time"			=>	"required",
				"duration"			=>	"required",
				"participant_price"	=>	"required",
				"observer_price"	=>	"required",
				"who_should_attend" =>	"required",
				"desp"				=>	"required",
				"seat_limit"		=>	"required",
				"status"			=>	"required"
			]);

			if ($validator->fails()) {
				return response()->json(array(
					'success' => false,
					'errors' => $validator->getMessageBag()->toArray()
				), 400);
			} 

			$array = [];
			$array['name'] 				= $request->name;
			$array['date']				= $request->date;
			$array['registration']		= $request->reg_time;
			$array['meeting_time']		= $request->zoom_time;
			$array['duration']			= $request->duration;
			$array['participant_price']	= $request->participant_price;
			$array['observer_price']	= $request->observer_price;
			$array['short_description'] = $request->desp;
			$array['who_should_attend'] = $request->who_should_attend;
			$array['status']			= $request->status;
			$array['seat_limit']		= $request->seat_limit;
			$array['available_seats']	= $request->available_seats;
			$array['updated_at']		= now();

			if (empty($request->course_id))
				$array['created_at']	= now();

			if (!empty($request->details))
				$array['details']	=	$request->details;

			if (!empty($request->structure))
				$array['structure']	=	$request->structure;

			if (!empty($request->aims))
				$array['course_aims']	=	$request->aims;

			if (!empty($request->aims))
				$array['course_aims']	=	$request->aims;

			if (!empty($request->tmc))
				$array['tmc']	=	$request->tmc;

			if (!empty($request->study_aid))
				$array['study_aid']	=	$request->study_aid;

			if ($request->hasfile('image')) {
				$file = $request->file('image');
				$extension = $file->getClientOriginalExtension(); 

	            if (in_array($extension, array('jpg', 'JPG', 'png', 'PNG',
	            	 'jpeg', 'JPEG', 'gif', 'GIF', 'bmp', 'BMP', 'tiff', 'TIFF'))) {
	              
	               $filename = time() . '.' . $extension;
	               $file->move(public_path() .
	                ("/img/upload"), $filename);
					
					$array['image']	=	$filename;
	            }
			}

			
			if (empty($request->course_id))
				DB::table('courses')->insert($array);
			else
				DB::table('courses')->where('id', $request->course_id )->update($array);


			if (empty($request->course_id))
				$return = ["success" => true,"msg"	=> "Course added"];
			else
				$return = ["success" => true,"msg"	=> "Course updated successfully"];

		} catch (Exception $e) {
			Log::info([
				"Error"	=>	$e->getMessage(),
				"File"	=>	$e->getFile(),
				"Line"	=>	$e->getLine()
			]);

			$return = ["success" => false,"error"	=>	$e->getMessage()];
		}

		return $return ?? '';
	}

	public function datatableMain(Request $request) {
		
		$data = DB::table('courses')->get();

		return Datatables::of($data)->
			addIndexColumn()->
			addColumn('name', function ($c) {
				return $c->name;
			})->

			addColumn('date', function ($c) {
				return date("d-M-Y", strtotime($c->date));
			})->

			addColumn('status', function ($c) {
				return ucfirst($c->status);
			})->

			addColumn('student_enrolled', function ($c) {
				$enrolled = $c->seat_limit - $c->available_seats;
				$url = route('admin.view_entries', $c->id);

				return <<<EOD
				$enrolled / $c->seat_limit	
EOD;
			})->

			addColumn('send_email', function ($c) {
				return <<<EOD
			<!--span onclick="mailCourses($c->id)" class="edit_btn text-success"><i class="fa fa-envelope"></i></span-->
EOD;
			})->

			addColumn('edit', function ($c) {
				$id = $c->id;
				return <<<EOD
			<span onclick="updateCourses($id)" class="edit_btn"><i class="fa fa-edit"></i></span>
EOD;
			})->

			addColumn('delete', function ($c) {
				return <<<EOD
				<span onclick="delete_course($c->id)" class="edit_btn text-danger"><i class="fa fa-trash"></i></span>
EOD;
			})->
			escapeColumns([])->make(true);
	}

	function viewModalUupdate() {
		$course = DB::table('courses')->find(request()->course_id);
	
		if (empty($course))
			abort(400);

		return view('components.courses_update_modal',compact('course'));	
	}

	public function deleteCourse(Request $request) {
		DB::table('courses')->where('id', request()->course_id)->delete();
		return ["success" => true];
	}

	public function enrolled_students(Request $request) {
			
		$data = DB::table('users')->
			join('payment', 'payment.user_id','users.id')->
			join('payment_course','payment_course.payment_id', 'payment.id')->
			where([
				'payment_course.course_id'	=>	$request->course_id,
				"payment.status"			=>	'success'
			])->select('users.*')->get();

		return Datatables::of($data)->
			addIndexColumn()->
			addColumn('name', function ($c) {
				return $c->name;
			})->

			addColumn('email', function ($c) {
				return $c->email;
			})->

			addColumn('last_date', function ($c) {
				return !empty($c->last_login) ? date("d-M-Y", strtotime($c->last_login)):'-';
			})->

			addColumn('status', function ($c) {
				return ucfirst($c->status);
			})->

			escapeColumns([])->make(true);

	}

	function course_tile() {
		$courses = DB::table('courses')->where('status','active')->paginate(6);
		return view("components.course_tile", compact('courses'));
	}

	function viewCourseDetailModal() {
		$course = DB::table('courses')->find(request()->course_id);
		return view("components.course_detail", compact('course'));
	}

	function viewMailModal() {
		$course = DB::table('courses')->find(request()->course_id);
		return view("components.course_mail_modal", compact('course'));
	}

	function userMyCourses() {
		$courses = DB::table('courses')->
			join('payment_course','payment_course.course_id','courses.id')->
			join('payment','payment.id','payment_course.payment_id')->
			where([
				"payment.user_id"	=>	\Auth::User()->id,
				'payment.status'	=>	'success'
			])->
			select('courses.*')->get();

		$user = true;
		$tile =  view("components.course_tile", compact('courses','user'))->render();
		return view('user.my_courses', compact('tile'));
	}

	function viewNotification(Request $request) {
		$notification  = DB::table('course_notification')->
			where('course_id', $request->course_id)->
			orderBy('created_at', 'desc')->	
			get();
		return view("components.course_notification", compact('notification'));
	}

	function resentCourseSubscribed() {
		return DB::table('courses')->
			join('payment_course','payment_course.course_id','courses.id')->
			join('payment','payment.id','payment_course.payment_id')->
			where([
				"payment.user_id"	=>	\Auth::User()->id ?? 0,
				'payment.status'	=>	'success'
			])->
			limit(5)->
			orderBy('payment.created_at', 'desc')->
			select('courses.*')->get();
	}
}
