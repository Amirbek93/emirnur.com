<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
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

Route::get('/',[PublicController::class,'index'])->name('index');
Route::get('/aboutus',[PublicController::class,'aboutus'])->name('aboutus');
Route::get('/portfolio',[PublicController::class,'portfolio'])->name('portfolio');
Route::get('/contact',[PublicController::class,'contact'])->name('contact');
Route::get('/blogs',[PublicController::class,'blogs'])->name('blogs');
Route::get('/blog/{id}',[PublicController::class,'blog'])->where('id','[0-9]{1,10}')->name('blog');
//Route::get('/blog-post',[PublicController::class,'blog-post'])->name('blog-post');
