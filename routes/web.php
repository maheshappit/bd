<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CsvController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login',[AdminController::class,'login_form'])->name('admin.login');
Route::post('login-functionality',[AdminController::class,'login_functionality'])->name('login.functionality');

Route::group(['middleware'=>'admin'],function(){
    Route::get('logout',[AdminController::class,'logout'])->name('logout');
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('edit',[AdminController::class,'edit'])->name('admin.edit');

    Route::post('update/{id}',[AdminController::class,'update'])->name('admin.update');

    Route::post('delete',[AdminController::class,'delete'])->name('admin.delete');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::view('/upload', 'upload-form'); // Display the form
Route::any('upload',[CsvController::class,'upload'])->name('upload');

