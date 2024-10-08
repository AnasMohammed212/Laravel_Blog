<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::get('/',[PostsController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostsController::class,'create'])->name('posts.create');
Route::post('/posts',[PostsController::class,'store'])->name('posts.store');
Route::get('/posts/{post}',[PostsController::class,'show'])->name('posts.show');
Route::get('/posts/{post}/edit',[PostsController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post}',[PostsController::class,'update'])->name('posts.update');
Route::delete('/posts/{post}',[PostsController::class,'destroy'])->name('posts.destroy');

//comments
Route::post('/posts/{post}/comments',[CommentsController::class,'store'])->name('posts.comments.store');
Route::delete('/comments/{comment}',[CommentsController::class,'destroy'])->name('comments.destroy');

Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

