<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\AboutController;
use Illuminate\Foundation\Console\AboutCommand;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\Front\CategoryController;
use App\Mail\SendMail;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/blog', function () {
        return view('index');
    })->name('blog');

    Route::resource('/category', \App\Http\Controllers\CategoryController::class);
    Route::resource('/post', \App\Http\Controllers\PostController::class);
    Route::resource('/comment', \App\Http\Controllers\CommentController::class);
    Route::resource('/about', \App\Http\Controllers\AboutController::class);
    Route::resource('/contact', AdminContactController::class);

});


// Front
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/front_about', [AboutController::class, 'front_about'])->name('front_about');
Route::get('/front_category', [CategoryController::class, 'front_category'])->name('front_category');
Route::get('/front_post', [PostController::class, 'front_post'])->name('front_post');
Route::get('mail', [ContactController::class, 'index'])->name('front_contact');
Route::post('send-mail', [ContactController::class, 'sendMail'])->name('sendMail');


Route::get('/category/{category:slug}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category.slug');
Route::get('/post/{post:slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('post_detay');

