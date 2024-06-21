<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmailVerification;
use App\Http\Controllers\SessionUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/', function () {
    return view('welcome');
});




Route::middleware('auth')->group(function(){

    Route::get('/blogs/create', [ BlogController::class ,'create'])->middleware('verified')->name('blogs.create');
    Route::post('/blogs', [ BlogController::class ,'store'])->middleware('verified')->name('blogs.store');
    Route::get('/blogs/{slug}/edit', [BlogController::class ,'edit'])->middleware('verified')->name('blogs.edit');
    Route::put('/blogs/{slug}', [BlogController::class ,'update'])->middleware('verified')->name('blogs.update');
    Route::delete('/blogs/{slug}', [BlogController::class ,'destroy'])->middleware('verified')->name('blogs.destroy');
    Route::post('/logout',[ SessionUserController::class,'destroy'])->middleware('verified')->name('session.destroy');

    // Email Verification
    Route::get('/email/verify', [ EmailVerification::class, 'verifyNotice'])->name('verification.notice');

    // The Email Verification Handler
    Route::get('/email/verify/{id}/{hash}',[ EmailVerification::class, 'VerifyEmail'])->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', [ EmailVerification::class, 'VerifyHandler'])->middleware('throttle:6,1')->name('verification.send');

    Route::post('/blog/{slug}/comments', [CommentController::class, 'store'])->name('blog.comments.store');

    // likes

    Route::post('/blog/{slug}/like', [LikeController::class, 'like'])->name('blog.like');
    Route::post('/blog/{slug}/unlike', [LikeController::class, 'unlike'])->name('blog.unlike');


    Route::post('/profile/{slug}', [UserController::class, 'update'])->name('users.update');



    Route::get('/profile/{slug}/edit', [UserController::class, 'edit'])->name('users.edit');
});
Route::get('/profile/{slug}', [UserController::class, 'show'])->name('users.show');




Route::get('/admin',[AdminController::class, 'index'])->middleware(['is_admin','verified'])->name('admin.index');
Route::get('/blogs', [BlogController::class ,'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class ,'show'])->name('blogs.show');


Route::middleware('guest')->group(function () {

    Route::view('/register','auth.register')->name('register');
    Route::post('/register',[ RegisterUserController::class,'store'])->name('register.store');
    Route::view('/login','auth.login')->name('login');
    Route::post('/login',[ SessionUserController::class,'store'])->name('session.store');

    // Password reset form
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

    // Handles form submittion
    Route::post('/forgot-password',[ResetPasswordController::class, 'handlePasswordForm'])->name('password.email');

    // Handles Verification Token
    Route::get('/reset-password/{token}',[ResetPasswordController::class, 'passwordReset'])->name('password.reset');

    // Handles Password Update
    Route::post('/reset-password',[ResetPasswordController::class, 'passwordUpdate'] )->name('password.update');

});