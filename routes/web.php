<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('students',[StudentController::class,'index']);
Route::get('addstudent',[StudentController::class,'addStudent']);
Route::post('student',[StudentController::class,'store']);
Route::get('student/{id}',[StudentController::class,'show']);
Route::get('student/edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::put('student/edit/{id}',[StudentController::class,'update']);
Route::get('student/delete/{id}',[StudentController::class,'destroy'])->name('student.delete');

});