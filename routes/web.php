<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CsvController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('admin/login',[AdminController::class,'login_form'])->name('admin.login');
Route::post('login-functionality',[AdminController::class,'login_functionality'])->name('login.functionality');


Route::group(['middleware'=>'admin'],function(){
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('edit',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('update/{id}',[AdminController::class,'update'])->name('admin.update');
    Route::get('delete',[AdminController::class,'delete'])->name('admin.delete');


});


Route::group(['middleware' => ['isVerified']], function () {

  

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('user.edit');


Route::any('/user/update', [App\Http\Controllers\HomeController::class, 'update'])->name('user.update');

// Route::view('/upload', 'upload-form'); // Display the form
Route::any('upload',[CsvController::class,'upload'])->name('upload');

Auth::routes();

Route::get('verify-otp', [App\Http\Controllers\Auth\LoginController::class,'getVerifyOTP'])->name('user.getVerifyOTP');
Route::post('verify-otp', [App\Http\Controllers\Auth\LoginController::class,'postVerifyOTP'])->name('user.postVerifyOTP');
Route::post('resend-otp', [App\Http\Controllers\Auth\LoginController::class,'resndOTP'])->name('user.resndOTP');
Route::post('login-with-otp', [App\Http\Controllers\Auth\LoginController::class,'loginWithOTP'])->name('user.loginWithOTP');



