<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\StringController;
use App\Http\Controllers\ArrayController;
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

Route::get('/user', function() {
    $name = '안녕하세요';
    $age = 20;
    return view('user', compact('name', 'age'));
});

Route::get('/test1', function() {
    return view('test1', ['name' => '<script>alert("hello");</script>']);
});

Route::get('/posts', [clientController::class, 'getAllPost'])->name('posts.getallpost');
Route::get('/posts/{id}', [clientController::class, 'getPostById'])->name('posts.getpostbyid');
Route::get('/add-post', [clientController::class, 'addPost'])->name('posts.addpost');
Route::get('/update-post', [clientController::class, 'updatePost'])->name('posts.update');
Route::get('/delete-post/{id}', [clientController::class, 'deletePost'])->name('posts.delete');
Route::get('/string', [StringController::class, 'index'])->name('string.index');
Route::get('/array', [ArrayController::class, 'index'])->name('array.index');