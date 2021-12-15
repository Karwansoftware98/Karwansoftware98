<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KarwanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/main',function(){
return view('main');
});

Route::get('product',[ProductController::class,'index'])->name('product.index');
Route::get('create',[ProductController::class,'create'])->name('product.create');
Route::post('store',[ProductController::class,'store'])->name('product.store');

Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
Route::post('store',[EmployeeController::class,'store'])->name('addImage');

Route::get('/employeeprofile',[EmployeeController::class,'show'])->name('employee.show');

Route::get('/editemployee/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
Route::get('/employeeprofile/delete/{id}',[EmployeeController::class,'delete'])->name('delete');


Route::put('/updateemployee/{id}',[EmployeeController::class,'update'])->name('employee.update');


Route::get('/import-form',[EmployeeController::class,'importForm']);

Route::get('/add-student',[StudentController::class,'addStudent']);

Route::get('/students',[StudentController::class,'exportInExcel'])->name('export.excel');

Route::post('/import',[StudentController::class,'import'])->name('student.import');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/students',[KarwanController::class,'fetchData']);

Route::get('/add-post',[PostController::class,'addpost']);
Route::post('/create-post',[PostController::class,'createPost'])->name('post.create');
Route::get('/posts',[PostController::class,'getPosts']);
Route::get('/posts/{id}',[PostController::class,'getPostById']);
Route::get('/delete-post/{id}',[PostController::class,'deletePost']);

Route::get('/edit-post/{id}',[PostController::class,'editPost'])->name('edit.post');
Route::get('/edit-post',[PostController::class,'edit']);
Route::put('/update-post',[PostController::class,'updatePost'])->name('update.post');

Route::get('/add-user',[UserController::class,'insertRecords']);
