<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupUserController;
use App\Mail\CommentEmail;



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

//groups
Route::get('/groups', [GroupController::class, 'index'])->middleware(['auth', 'verified'])->name("groups.index");

Route::get('/groups/{id}', [GroupController::class, 'show'])->middleware(['auth', 'verified'])->name("groups.show");

//group_user pivot
Route::get('followedGroups', [GroupUserController::class, 'index'])->middleware(['auth', 'verified'])->name("groupUser.index");
Route::patch('/followedGroups/{id}/update', [GroupUserController::class, 'update'])->middleware(['auth', 'verified'])->name('groupUser.update');

Route::get('/user/{id}', [UserController::class, 'show'])
->middleware(['auth', 'verified'])->name("user.show");

//posts storing
Route::post('posts', [PostController::class,'store'])->middleware(['auth', 'verified'])->name('posts.store');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('posts.edit');
Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('posts.destroy');
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name("posts.show");

//comments
Route::get('/comments/create', [CommentController::class,'create'])->name('comments.create');
Route::post('/comments', [CommentController::class,'store'])->middleware(['auth', 'verified'])->name('comments.store');
Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->middleware(['auth', 'verified'])->name('comments.edit');
Route::patch('/comments/{id}/update', [CommentController::class, 'update'])->middleware(['auth', 'verified'])->name('comments.update');
Route::delete('/comments/{id}/destroy', [CommentController::class, 'destroy'])->middleware(['auth', 'verified'])->name('comments.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
