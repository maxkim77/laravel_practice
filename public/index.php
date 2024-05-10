<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

/*define('LARAVEL_START', microtime(true)); 는 LARAVEL_START라는 이름의 상수를 정의하고, 현재의 마이크로타임을 값으로 설정
이 상수는 애플리케이션의 로딩 시간을 측정하는 데 사용
*/
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|

Maintenance Check (유지보수모드 확인):
코드는 먼저 서버가 유지보수 모드인지 확인합니다. 
만약 storage/framework/maintenance.php 파일이 존재한다면, 해당 파일을 로드하여 유지보수 모드 페이지를 표시합니다.
 이는 시스템이 업데이트 중일 때 사용자에게 친절한 메시지를 보여줄 수 있는 기능입니다.
 애플리케이션이 점검 모드일 경우 애플리케이션에서 지정한 모든 라우팅이 특정한 화면으로 보여지게 됩니다.
 점검모드활성화
 php artisan down
 점검모드 종료
 php artisan up
 점검모드 우회
php artisan down --secret="1630542a-246b-4b66-afa1-dd72a4c4351666545545"
resources/views/errors/503.blade.php

*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.

Auto Loader Registration (오토 로더 등록):
vendor/autoload.php 파일을 요구합니다. 
이 파일은 Composer 의존성 관리자에 의해 생성되며, 프로젝트에서 사용하는 클래스들을 자동으로 로드할 수 있게 합니다. 
이는 클래스 파일을 일일이 require 하지 않고도 클래스들을 자동으로 사용할 수 있게 해줍니다.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
  부트스트랩 폴더에서 애플리케이션을 불러와서 커널인스턴스를 생성하고 http 요청을 처리하고 응답을 보내는 과정
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
//현재 HTTP 요청을 포착하고, 이를 Request 객체로 만들어 변수 $request에 저장하는 기능
// Laravel에서는 HTTP 요청과 관련된 모든 정보를 처리하고 접근할 때 Request 클래스를 사용하는데, 이 클래스는 클라이언트에서 서버로 보낸 데이터를 캡슐화
)->send();

$kernel->terminate($request, $response);
