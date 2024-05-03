<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/{name?}', function($name = null){
    return 'Hi, '. $name;
});

Route::get('/products/{id?}', function($id = null){
    return 'Product id is '. $id;
})->where('id', '[0-9]+');
// 'a-zA-Z0-9'
// [0-9]+

Route::get('/posts/all', [clientController::class, 'getAllPost'])->name('posts.getallposts');
Route::get('/posts/{id}', [clientController::class, 'getPostById'])->name('posts.getpostbyid');
Route::get('/add-post', [clientController::class, 'addPost'])->name('posts.addpost');
Route::get('/update-post', [clientController::class, 'updatePost'])->name('posts.update');
Route::get('/delete-post/{id}', [clientController::class, 'deletePost'])->name('posts.delete');