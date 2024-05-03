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

Route::get('/products/{id?}', function($id = null){
    return 'Product id is '. $id;
})->where('id', '[0-9]+');
// 'a-zA-Z0-9'
// [0-9]+

Route::get('/user', function() {
    $name = '안녕하세요';
    $age = 20;
    return view('user', compact('name', 'age'));
});

Route::get('/test1', function() {
    return view('test1', ['name' => '<script>alert("hello");</script>']);
});


Route::get('/string', [StringController::class, 'index'])->name('string.index');
Route::get('/array', [ArrayController::class, 'index'])->name('array.index');

/* User */
 // 뷰 반환 라우트
Route::get('/user/view/{id}', [UserController::class, 'showView']);
// 응답 반환 라우트
Route::get('/user/response/{id}', [UserController::class, 'showResponse']);

/* Login */
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login.submit');

/* Session */
Route::get('/session/get', [SessionController::class, 'getSessionData'])->name('session.get');
Route::get('/session/set', [SessionController::class, 'storeSessionData'])->name('session.store');
Route::get('/session/remove', [SessionController::class, 'deleteSessionData'])->name('session.delete');

/* Post */
Route::get('/posts', [PostController::class, 'getAllPost'])->name('posts.getallpost');
Route::get('/add-post', [PostController::class, 'addPost'])->name('post.add');
Route::post('/add-post', [PostController::class, 'addPostSubmit'])->name('post.addsubmit');
Route::get('/posts/{id}', [PostController::class, 'getPostById'])->name('post.getbyid');
Route::get('/edit-post/{id}', [PostController::class, 'editPost'])->name('post.edit');
Route::post('/update-post', [PostController::class, 'updatePost'])->name('post.update');
Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('post.delete');
Route::get('/inner-join', [PostController::class, 'innerJoinClause'])->name('post.innerjoin');
Route::get('/all-posts', [PostController::class, 'getAllPostUsingModel']);

// Route::resource('photos', PhotoController::class);

Route::get('/select-user-procedure', [TestUserController::class, 'selectUser']);
Route::get('/select-user-orm', [TestUserController::class, 'selectUserOrm']);
