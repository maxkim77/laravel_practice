<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/* 
Rotues에는 컨트롤러 클래스의 사용을 강제하지는 않으므로 
사전에 routes 디렉토리의 web.php파일의 uri와 대응하는 클래스라면 
어떤 클래스를 실행하더라도 응답을 반환 할수 있음


하지만 컨트롤러를 사용한다면 컨트롤러는 URL에 대응하는 엑션 메서드를 가지고 있음
이러한 액션 메서드를 통해 특정 HTTP 요청에 대한 로직을 처리하고, 적절한 응답을 구성하여 반환합니다.
 각 액션 메서드는 특정 라우트와 연결되어 있으며, 라우트 정의에 따라 호출됩니다.

 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
