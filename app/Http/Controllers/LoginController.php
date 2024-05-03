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

    public function loginSubmit(Request $request) //: array
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ]);
        // return $request->all();
        // 여기서 $requestData를 사용하여 요청 데이터에 액세스합니다.
        // 예를 들어:
        $requestData = $request->all();
        $email = $requestData['email'];
        $password = $requestData['password'];
        return ['email' => $email, 'password' => $password];
    }
    
}