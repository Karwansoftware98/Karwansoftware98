<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\SuperAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use Brian2694\Toastr\Facades\Toastr;
use RealRashid\SweetAlert\Facades\Alert;

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
    return view('index');
});

Auth::routes();
Auth::routes([
    'register' => false
]);

// staff auth route
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('teacher/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('teacher/login/teacher', 'Auth\LoginController@login')->name('login.teacher');

// super admin route
Route::group(['middleware' => 'super_admin'], function()
{
//    Alert::success('welcome','Admin');
   toast()->success('<strong style="color:white">Welcome Admin</strong>')->background('#4B8B3B');
Route::get('/home', [SuperAdminController::class,'index'])->name('home');
Route::get('/add_teacher', 'SuperAdminController@AddTeacher')->name('add_teacher');
Route::get('/teachers', 'SuperAdminController@Teachers')->name('teachers');
Route::get('/teacher_distributing', 'SuperAdminController@TeacherDistributing')->name('teacher_distributing');
Route::get('/add_committee_staff', 'SuperAdminController@AddCommitteeStaff')->name('add_committee_staff');
Route::get('/committee_staff', 'SuperAdminController@CommitteeStaff')->name('committee_staff');

//k_s


Route::post('/add_teacher',[SuperAdminController::class,'importingTeachers'])->name('import.teachers');
Route::delete('/deleting-staff/{id}',[SuperAdminController::class,'deleteTeacher'])->name('deleting.teacher');
Route::post('/academic_year_add',[SuperAdminController::class,'academicYear'])->name('add.academic.year');
Route::get('/get_teacher_id/{id}',[SuperAdminController::class,'getting_teacher_id'])->name('get.teacher.id');
Route::post('/storestudent',[AdminController::class,'importingStudent'])->name('student.import');
Route::get('/teacherupdate',[SuperAdminController::class,'updateTeacher'])->name('teacher.update');
//k_e

Route::post('/teachersupdate', 'SuperAdminController@StoreTeachers')->name('teachers.update');
Route::post('/store_academic_year', 'SuperAdminController@StoreAcademicYear')->name('store_academic_year');
Route::get('/assign_committee_staff', 'SuperAdminController@AssignCommitteeStaff')->name('assign_committee_staff');

});



// admin route
Route::group(['middleware' => 'leader'], function()
{
    Route::get('/add_student', 'AdminController@AddStudent')->name('add_student');
    Route::get('/student_detail', 'AdminController@StudentDetail')->name('student_detail');
    Route::post('/store_student', 'AdminController@StoreStudent')->name('store_student');
});





// student auth route
Route::prefix('student')->group(function() {

    Route::get('login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('login/student', 'Auth\StudentLoginController@login')->name('login.student');
    Route::get('logout', 'Auth\StudentLoginController@logout')->name('student.logout');
    Route::get('/', 'StudentController@index')->name('student');
    Route::delete('/delete.student/{id}',[AdminController::class,'deleteStudent'])->name('student.delete');
});



