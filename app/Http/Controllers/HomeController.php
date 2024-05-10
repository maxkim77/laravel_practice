<?php

namespace App\Http\Controllers;
/*
사용자가 제공한 이름이 컨트롤러의 메소드로 전달되는지 확인하고, 메소드가 올바르게 실행되어 응답이 생성되는지를 확인하는 실습
*/
// 기본 컨트롤러 클래스를 상속받는 HomeController 클래스 선언
// 컨트롤러 클래스는 라라벨의 base controller 클래스를 상속받아야 합니다. <-Controller.php 확인! 
// http://127.0.0.1:8000/home/
class HomeController extends Controller
{
    // public function index()
    // {
    //     return 'Hi, from HomeController';
    // }
    // 'index' 함수는 이름을 선택적으로 받을 수 있으며 문자열을 반환
    public function index($name = null): string
    {
        // 이름이 제공되면 그 이름을 포함하여 인사말을 반환
        return 'Hi, from HomeController! ' . $name;   
    }
}
