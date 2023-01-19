<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [CategoryController::class,'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::match(['get','post'],'/dashboard/{categoryId}', [PostController::class,'showAll'])->middleware(['auth', 'verified'])->name('dashboard.posts');

Route::match(['get','post'],'/dashboard/{categoryId}/{postId}', [PostController::class,'showPost'])->middleware(['auth', 'verified'])->name('dashboard.post.content');

Route::get('/dashboard/{categoryId}/{postId}/{commentId}', [PostController::class,'delete'])->middleware(['auth', 'verified'])->name('dashboard.comment.delete');

Route::get('/user/{id}',[UserController::class,'show'])->middleware('auth','verified');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
