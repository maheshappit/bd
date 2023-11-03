<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CsvController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('user.edit');


Route::any('/user/update', [App\Http\Controllers\HomeController::class, 'update'])->name('user.update');

// Route::view('/upload', 'upload-form'); // Display the form
Route::any('upload',[CsvController::class,'upload'])->name('upload');

