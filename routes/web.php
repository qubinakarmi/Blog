<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {

    Route::view('welcome', 'welcome');
    Route::view('dashboard', 'dashboard');
    Route::view('home', 'home')->name('home');
    Route::get('blogpage',[UserController::class,'showBlogs'])->name('blog.show');
});



Route::controller(UserController::class)->group(function () {
    // view login
    Route::get('login', 'showlogin')->name('login');
    // form
    Route::post('login-user', 'login')->name('login-user');
    Route::post('register', 'register')->name('register');

    // logout

});


Route::view('register', 'register');



Route::middleware(['auth', 'admin'])->prefix('admin')->controller(UserController::class)->group(function () {

    Route::view('/blog', 'blog')->name('blog');
    Route::post('/add', 'blog')->name('add.blog');
    Route::get('/list', 'bloglist')->name('list.blog');
    Route::get('/delete/{id}', 'blogdelete')->name('delete.blog');
    Route::get('/edit/{id}', 'blogedit');
    Route::put('/edit/{id}', 'editlist')->name('editlist');

 
});


Route::get('login', [UserController::class, 'showUserLogin'])->name('login');
Route::post('login-user', [UserController::class, 'userLogin'])->name('login-user');

// Admin login routes
Route::get('admin/login', [UserController::class, 'showAdminLogin'])->name('admin.login');
Route::post('admin/login-user', [UserController::class, 'adminLogin'])->name('admin.login-user');

Route::post('logout', [UserController::class, 'logout'])->name('logout');

