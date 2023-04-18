<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;



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
Route::get('/groups', [GroupController::class, 'index'])
->middleware(['auth', 'verified'])->name("groups.index");

Route::get('/groups/{id}', [GroupController::class, 'show'])
->middleware(['auth', 'verified'])->name("groups.show");




Route::get('/user/{id}', [UserController::class, 'show'])
->middleware(['auth', 'verified'])->name("user.show");

//For adding an image
Route::get('/add-image',[ImageUploadController::class,'addImage'])->name('images.add');

//For storing an image
Route::post('/store-image',[ImageUploadController::class,'storeImage'])
->name('images.store');

//For showing an image
Route::get('/view-image',[ImageUploadController::class,'viewImage'])->name('images.view');

//posts creating
//Route::get('posts/create', [PostController::class,'create'])->name('posts.create');
//posts storing
Route::post('posts', [PostController::class,'store'])->middleware(['auth', 'verified'])->name('posts.store');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('posts.edit');
Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('posts.update');
Route::patch('/posts/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('posts.destroy');

//comments
Route::get('comments/create', [CommentController::class,'create'])->name('comments.create');
Route::post('comments', [CommentController::class,'store'])->middleware(['auth', 'verified'])->name('comments.store');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
