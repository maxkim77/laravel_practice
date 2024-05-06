<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* 
라라벨에서 API 라우트의 /api 접두사(prefix) 설정은 RouteServiceProvider 클래스 안에 정의되어 있습니다. 
이 클래스는 라우트 파일들을 로드하고 각 라우트 그룹의 특정 속성들을 설정하는 역할을 합니다.
*/

Route::get('/example', function () {
    return 'This is an example route in customapi.php';
});