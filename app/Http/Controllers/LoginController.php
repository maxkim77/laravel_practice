<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // 로그인 페이지 보기
    public function index()
    {
        return view('login');
    }

  
}
