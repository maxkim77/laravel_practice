<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/* 컨트롤러는 기본 컨트롤러 클래스를 필수로 상속 받지 않아도 작동합니다. 
미들웨어(middleware) 및 권한 부여(authorize)와 유효성 검사(validate) 기능을 사용할 수 있도록 하는 클래스입니다.
특히 유효성검사는 컨트롤러에서 사용자의 입력값을 검증하는데 사용됩니다.
또한 유효성을 검사함으로써 애플리케이션에 유효하지 않은 또는 해로운 데이터가 들어오는 것을 방지할 수 있습니다.(xss, sql injection 등)
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
