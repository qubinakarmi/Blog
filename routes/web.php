<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function(){

    Route::view('welcome','welcome');
    Route::view('dashboard','dashboard');
    Route::view('home','home')->name('home');



});

 

Route::controller(UserController::class)->group(function(){

Route::post('login-user', 'login')->name('login-user');
Route::get('login','showlogin')->name('login');
Route::post('register','register')->name('register');
Route::get('logout','logout')->name('logout');


});


Route::view('register','register');



Route::view('blog','blog');
Route::post('blog',[UserController::class,'blog'])->name('blog');
Route::get('/blog-list', [UserController::class, 'showBlogs'])->name('blogpage');

Route::get('admin-list', [UserController::class, 'bloglist'])->name('bloglist');