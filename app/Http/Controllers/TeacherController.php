<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use Log;
use Auth;


class TeacherController extends Controller
{
    //

	public function addNewTeacher(Request $request) {
		try {
			$validator = Validator::make($request->all(),[
				"name"				=>	"required|min:5",
				"designation"		=>	"required",
				"description"		=>	"required"
			]);

			if ($validator->fails()) {
				return response()->json(array(
					'success' => false,
					'errors' => $validator->getMessageBag()->toArray()
				), 400);
			} 

			$array = [];
			$array['name']			= $request->name;
			$array['designation']	= $request->designation;
			$array['description']	= $request->description;
			$array['updated_at']		= now();

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

			if (empty($request->teacher_id))
				$array['created_at']	= now();

			if (empty($request->teacher_id))
				DB::table('teacher')->insert($array);
			else
				DB::table('teacher')->where('id', $request->teacher_id)->update($array);

			if (empty($request->teacher_id))
				$return = ["success" => true,"msg"	=> "Teacher added"];
			else
				$return = ["success" => true,"msg"	=> "Teacher update"];

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
		$data = DB::table('teacher')->orderBy('created_at','desc')->get();
		return Datatables::of($data)->
			addIndexColumn()->

			addColumn('name', function ($t) {
				return $t->name;
			})->

		
			addColumn('degn', function ($t) {
				return $t->designation;
			})->

			addColumn('date', function ($t) {
				return date('d-M-Y', strtotime($t->created_at));
			})->

			addColumn('edit', function ($t) {
				return <<<EOD
			<span onclick="updateTeacher($t->id)" class="edit_btn"><i class="fa fa-edit"></i></span>
EOD;
			})->

			addColumn('delete', function ($t) {
				return <<<EOD
				<span onclick="deleteTeacher($t->id)" class="edit_btn text-danger"><i class="fa fa-trash"></i></span>
EOD;
			})->

			escapeColumns([])->make(true);
	}

	function viewModalUupdate() {
		try {

			$teacher = DB::table('teacher')->find(request()->teacher_id);
		
			if (empty($teacher))
				abort(400);

			return view('components.teacher_update_modal',compact('teacher'));
		} catch (Exception $e) {
			Log::info([
				"Error"	=>	$e->getMessage(),
				"File"	=>	$e->getFile(),
				"Line"	=>	$e->getLine()
			]);

			return ["success" => false,"error"	=>	$e->getMessage()];
		}	
	}

	public function deleteTeacher(Request $request) {
		DB::table('teacher')->where('id', request()->teacher_id)->delete();
		return ["success" => true];
	}

	function teacher_tile() {
		$teachers = DB::table('teacher')->paginate(6);
		return view("components.teacher_tile", compact('teachers'));
	}

	function viewTeacherDetailModal() {
		$teacher = DB::table('teacher')->find(request()->teacher_id);
		return view("components.teacher_detail", compact('teacher'));
	}
}
