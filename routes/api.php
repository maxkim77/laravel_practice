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



Route::get('/', function () {
    return 'Welcome'; 
});

/*
매개변수가 있는 라우터 반환
파라미터가 있는 라우터 반환
매개변수가 비었으면 id변수는 null
*/
Route::get('/users/{id}', function($id){
    return 'User id is '. $id;
});


// Route::get('/users/{name?}', function($name = null){
//     return 'Hi, '. $name;
// })->where('name', '[a-zA-Z]+');
// ->where('name', '[a-zA-Z]+');


Route::get('/products/{id?}', function($id = null){
    return 'Product id is '. $id;
})->where('id', '[0-9]+');
// 'a-zA-Z0-9'
// [0-9]+

/*
정규표현식으로 들어오는 파라미터의 형식을 제한할수 있음
보안상의 이유로 사용자가 입력한 값이 숫자인지 문자인지 등을 제한할수 있음
*/

/* 
라라벨에서 API 라우트의 /api 접두사(prefix) 설정은 RouteServiceProvider 클래스 안에 정의되어 있습니다. 
이 클래스는 라우트 파일들을 로드하고 각 라우트 그룹의 특정 속성들을 설정하는 역할을 합니다.
*/

Route::get('/posts/all', [clientController::class, 'getAllPost'])->name('posts.getallposts');
Route::get('/posts/{id}', [clientController::class, 'getPostById'])->name('posts.getpostbyid');
Route::get('/add-post', [clientController::class, 'addPost'])->name('posts.addpost');
Route::get('/update-post', [clientController::class, 'updatePost'])->name('posts.update');
Route::get('/delete-post/{id}', [clientController::class, 'deletePost'])->name('posts.delete');