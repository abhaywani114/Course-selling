<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use \DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 
Route::get('/', function () {
	$course = DB::table('courses')->first(); 
	// app("App\Http\Controllers\CoursesController")->course_tile()->render();

	$teachers = app("App\Http\Controllers\TeacherController")->teacher_tile()->render();

	$subscribed = collect();
	//app("App\Http\Controllers\CoursesController")->resentCourseSubscribed();
	
	$is_admin = !empty(request()->admin);

    return view('welcome',compact('course','teachers','subscribed', 'is_admin'));
});

Route::get('/admin/courses', function () {
    return view('admin.courses');
})->name('admin.courses')->middleware('CheckUType:admin');

Route::get('/admin/teachers', function () {
    return view('admin.teachers');
})->name('admin.teachers')->middleware('CheckUType:admin');;



Route::get('/admin/manage_admins', function () {
    return view('admin.manage_admins');
})->name('admin.manage_admins')->middleware('CheckUType:admin');;

Route::get('/admin/view_entries/{course_id}', function () {
    return view('admin.view_entries');
})->name('admin.view_entries')->middleware('CheckUType:admin');;

Route::get('/myprofile/update', function () {
    return view('myprofile_update');
})->name('myprofile.update')->middleware('CheckUType:both');;

Route::post('contact_us', [mailController::class, "sendContactForm"])->
	name('contact_us');

Route::get('/admin/view_payment', [PaymentController::class, "view_payment"] )->
	name('admin.view_payment')->middleware('CheckUType:admin');;


//User Management Routes
Route::post('usermanagement/signup', [UserManagementController::class, "signup"])->
	name('usermanagement.signup')->middleware('guest');;

Route::post('usermanagement/login', [UserManagementController::class, "login"])->
	name('usermanagement.login');

Route::post('usermanagement/reset', [UserManagementController::class, "reset"])->
	name('usermanagement.reset');

Route::post('usermanagement/logout', [UserManagementController::class, "logout"])->
	name('usermanagement.logout')->middleware('CheckUType:all');;

Route::post('/admin/adminmanagement/new', [UserManagementController::class, "addNewTeacher"])->
	name('admin.adminmanagement.new')->middleware('CheckUType:admin');;

Route::post('/admin/adminmanagement/datatable_main', [UserManagementController::class, "datatableMain"])->
	name('admin.adminmanagement.datatable_main')->middleware('CheckUType:admin');;

Route::post('/admin/adminmanagemen/update', [UserManagementController::class, "viewModalUupdate"])->
	name('admin.adminmanagemen.update')->middleware('CheckUType:admin');;

Route::post('/admin/adminmanagemen/delete', [UserManagementController::class, "deleteAdmin"])->
	name('admin.adminmanagement.delete')->middleware('CheckUType:admin');;


Route::post('/admin/adminmanagement/update_profile', [UserManagementController::class, "updateProfile"])->
	name('admin.adminmanagement.updateprofile')->middleware('CheckUType:both');;

//Courses Management Routes

//Courses
Route::post('/admin/courses/new', [CoursesController::class, "newCourse"])->
	name('admin.courses.new')->middleware('CheckUType:admin');;

Route::post("/courses/paginatiom", [CoursesController::class, "course_tile"])->
	name("courses.pagination");

Route::post('/admin/courses/datatable_main', [CoursesController::class, "datatableMain"])->
	name('admin.courses.datatable_main')->middleware('CheckUType:admin');

Route::post('/admin/courses/update', [CoursesController::class, "viewModalUupdate"])->
	name('admin.courses.update')->middleware('CheckUType:admin');

Route::post('/admin/courses/delete', [CoursesController::class, "deleteCourse"])->
	name('admin.courses.delete')->middleware('CheckUType:admin');

Route::post('/admin/courses/entrolled_students', [CoursesController::class, "enrolled_students"])->
	name('admin.courses.entrolled_students')->middleware('CheckUType:admin');;

Route::post('/courses/view-course-detail-modal', [CoursesController::class, "viewCourseDetailModal"])->
	name('admin.courses.viewCourseDetail');

Route::post('/courses/view-mail-modal', [CoursesController::class, "viewMailModal"])->
	name('admin.courses.mail_modal')->middleware('CheckUType:admin');;

Route::get('/user/my_courses',[CoursesController::class, "userMyCourses"] )->name('user.my_courses')->middleware('CheckUType:user');;

Route::post('/user/my_courses_notification',[CoursesController::class, "viewNotification"] )->
	name('user.my_courses_notification')->middleware('CheckUType:user');;

Route::post('/course/send_mail', [mailController::class, "sendCourseMail"])->
	name('admin.courses.send_mail')->middleware('CheckUType:admin');;

//Teachers
Route::post('/admin/teachers/datatable_main', [TeacherController::class, "datatableMain"])->
	name('admin.teachers.datatable_main')->middleware('CheckUType:admin');;

Route::post('/admin/teachers/new', [TeacherController::class, "addNewTeacher"])->
	name('admin.teachers.new')->middleware('CheckUType:admin');;

Route::post('/admin/teachers/update', [TeacherController::class, "viewModalUupdate"])->
	name('admin.teachers.update')->middleware('CheckUType:admin');;

Route::post('/admin/teachers/delete', [TeacherController::class, "deleteTeacher"])->
	name('admin.teachers.delete')->middleware('CheckUType:admin');;

Route::post("/teachers/paginatiom", [TeacherController::class, "teacher_tile"])->
	name("teachers.pagination");

Route::post('/courses/view-teacher-detail-modal', [TeacherController::class, "viewTeacherDetailModal"])->
	name('admin.courses.viewTeacherDetail');

	//Payment
Route::post("/payment/checkout", [PaymentController::class, "checkout"])->
	name("payment.checkout");

Route::get("/payment/{tx_id}/response", [PaymentController::class, "response"])->name("payment_response");
