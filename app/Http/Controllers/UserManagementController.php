<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \Exception;
use \Log;
use DB;
use Hash;

class UserManagementController extends Controller
{
    //
	
	function signup(Request $request) {
		try {

			$validator = Validator::make($request->all(),[
				"name"		=>	"required|min:5",
				"email"		=>	"required|email:rfc|unique:users,email",
				"password"	=>	"required|confirmed"
			]);

			if ($validator->fails()) {
				return response()->json(array(
					'success' => false,
					'errors' => $validator->getMessageBag()->toArray()
				), 400);
			} 
			
			DB::table('users')->insert([
				"name"			=>	$request->name,
				"email"			=>	$request->email,
				"password"		=>	Hash::make($request->password),
				'type'			=>	'user',
				"created_at"	=>	date("Y-m-d H:i:s"),
				"updated_at"	=>	date("Y-m-d H:i:s")
			]);
		 	
			$return = ["success" => true, "msg" =>	"Account created successfully, please login now."];
		} catch (Exception $e) {
			Log::info([
				"Error"	=>	$e->getMessage(),
				"File"	=>	$e->getFile(),
				"Line"	=>	$e->getLine()
			]);

			$return =  response()->json(array(
					'success' => false,
					'errors' => [$e->getMessage()]
				), 400);
		}
		
		return $return ?? '';
	}

	public function login(Request $request) {
		try {

				$request->session()->flash('form', 'login');
		
				$validator = Validator::make($request->all(),[
					"email"		=>	"required|",
					"password"	=>	"required"
				]);

				if ($validator->fails()) {
					return response()->json(array(
						'success' => false,
						'errors' => $validator->getMessageBag()->toArray()
					), 400);
				} 
		
				$credentials = $request->only('email', 'password');
				if (Auth::attempt($credentials)) {
					$useru = User::find(Auth::id());
					$useru->last_login =now();
					$useru->save();
				} else {
					throw new Exception("Invalid username/password");
				}

				$return = ["success" => true,	"msg"	=>	"Logged in successfully"];
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

	public function logout() {
		try {
			Auth::logout();
			$return = ["success" => true];
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

		public function addNewTeacher(Request $request) {
		try {

			if (empty($request->admin_id)) {
				$validator = Validator::make($request->all(),[
					"name"				=>	"required|min:5",
					"email"				=>	"required|email:rfc|unique:users,email",
					"password"			=>	"required|confirmed",
					"status"			=>	"required"
				]);
			} else {
				$user = DB::table('users')->find(request()->admin_id);
				$validator = Validator::make($request->all(),[
					"name"				=>	"required|min:5",
					"email"				=>	($user->email != $request->email) ? "required|email:rfc|unique:users,email":"required",
					"password"			=>	"confirmed",
					"status"			=>	"required"
				]);
			}


			if ($validator->fails()) {
				return response()->json(array(
					'success' => false,
					'errors' => $validator->getMessageBag()->toArray()
				), 400);
			} 

			$array = [];
			$array['name']			= $request->name;
			$array['email']			= $request->email;
			
			if (!empty($request->password))
				$array['password']		= Hash::make($request->password);

			$array['type']			= 'admin';
			$array['status']		= $request->status;
			$array['updated_at']	= now();

			if (empty($request->admin_id))
				$array['created_at']	= now();

			if (empty($request->admin_id))
				DB::table('users')->insert($array);
			else
				DB::table('users')->where('id', $request->admin_id)->update($array);

			if (empty($request->teacher_id))
				$return = ["success" => true,"msg"	=> "Admin added"];
			else
				$return = ["success" => true,"msg"	=> "Admin update"];

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

		public function updateProfile(Request $request) {
			
			try {

				$validator = Validator::make($request->all(),[
					"password"			=>	"confirmed",
				]);
		
				if (!empty($request->password))
					$array['password']		= Hash::make($request->password);

				$array['updated_at']	= now();

				DB::table('users')->where('id', Auth::User()->id)->update($array);

				$return = ["success" => true,"msg"	=> "Profile update"];	
				
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
		
		$data = DB::table('users')->where('type','admin')->get();

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

			addColumn('edit', function ($c) {
				$id = $c->id;
				return <<<EOD
			<span onclick="updateAdmin($id)" class="edit_btn"><i class="fa fa-edit"></i></span>
EOD;
			})->

			addColumn('delete', function ($c) {
				return <<<EOD
				<span onclick="delete_admin($c->id)" class="edit_btn text-danger"><i class="fa fa-trash"></i></span>
EOD;
			})->
			escapeColumns([])->make(true);
	}

	function viewModalUupdate() {
		$user = DB::table('users')->find(request()->admin_id);
	
		if (empty($user))
			abort(400);

		return view('components.admin_update_modal',compact('user'));	
	}

	public function deleteAdmin(Request $request) {
		DB::table('users')->where('id', request()->course_id)->delete();
		return ["success" => true];
	}

	function reset(Request $request) {

		$validator = Validator::make($request->all(),[
			"email"		=>	"required|email:rfc|exists:users,email",
		]);

		if ($validator->fails()) {
			return response()->json(array(
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray()
			), 400);
		}

		$new_password =  strtoupper(substr(preg_replace("/[^a-zA-Z0-9]+/", "",
			  base64_encode(random_bytes(16))), 0, 7)); 
	
		DB::table('users')->
			where('email', $request->email)->update([
				"password"		=> Hash::make($new_password),
				"updated_at"	=> now()
			]);
		 app('App\Http\Controllers\mailController')->sendResetPassword($request->email, $new_password);

		 return  ["success" => true,	"msg"	=>	"Password reset successfully. Please check your inbox."];
	}
}
