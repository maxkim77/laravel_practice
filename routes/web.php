<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StringController;
use App\Http\Controllers\ArrayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestUserController;

// use App\Http\Controllers\PhotoController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home/{name?}', [HomeController::class, 'index'])->name('home.index');


/* User */
 // 뷰 객체 반환 라우트
Route::get('/user/view/{id}', [UserController::class, 'showView']);
// response 반환 라우트
Route::get('/user/response/{id}', [UserController::class, 'showResponse']);

/* Login */
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login.submit');


/* Post */
Route::get('/posts', [PostController::class, 'getAllPostUsingModel'])->name('posts.getallpost');
Route::get('/add-post', [PostController::class, 'addPost'])->name('post.add');
Route::post('/add-post', [PostController::class, 'addPostSubmit'])->name('post.addsubmit');
Route::get('/posts/{id}', [PostController::class, 'getPostById'])->name('post.getbyid');
Route::get('/edit-post/{id}', [PostController::class, 'editPost'])->name('post.edit');
Route::post('/update-post', [PostController::class, 'updatePost'])->name('post.update');
Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('post.delete');
Route::get('/inner-join', [PostController::class, 'innerJoinClause'])->name('post.innerjoin');
Route::get('/all-posts', [PostController::class, 'getAllPostUsingQuery']);
use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class);

Route::get('/select-user-procedure', [TestUserController::class, 'selectUserProcedure']);
Route::get('/select-user-orm', [TestUserController::class, 'selectUserOrm']);

Route::get('/livewire', function() {
    return view('livewire');
});

Route::get('/practice', function() {
    return view('practice');
});
