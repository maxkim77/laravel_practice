<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     * 전역미들웨어 목록정의
     *보안, 요청 사이즈 검증, 문자열정리 및 변환 등을 처리하는 미들웨어 포함
     * 
     */
    protected $middleware = [
        // 글로벌 미들웨어
        // 신뢰할수 있는 호스트를 기술 하고 그외의 호스트로부터의 요청을 거부하는 미들웨어
        // \App\Http\Middleware\TrustHosts::class,
        // 역방향 프록시또는 로드밸런서를 신뢰할 수 있는지 확인하는 미들웨어
        \App\Http\Middleware\TrustProxies::class,
        // 다른 도메인으로부터 자바스크립트 등을 통한 호출로 HTTP 요청을 제한하는 브라우저의 보안설정
        \Illuminate\Http\Middleware\HandleCors::class,
        // 유지보수 접근 제한
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        // HTTP 요청의 본문 크기를 검증하는 미들웨어
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        // 빈문자열을 제거하는 미들웨어
        \App\Http\Middleware\TrimStrings::class,
        // 빈문자열을 null로 변환하는 미들웨어
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     * 특정 유형의 요청에 적용되는 그룹 미들웨어 목록 정의
     * web 인터페이스관련 요청, api 요청 등의 미들웨어그룹 정의
     */
    protected $middlewareGroups = [
        'web' => [
            // 웹 인터페이스 요청에 적용되는 미들웨어 그룹
            // 쿠키 암호화 및 복호화
            \App\Http\Middleware\EncryptCookies::class,
            // 쿠키를 응답에 추가하는 미들웨어
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            // 세션을 시작하는 미들웨어
            \Illuminate\Session\Middleware\StartSession::class,
            // 세션의 에러 키로부터 얻은 내용을 블레이드 탬플릿의 error 변수에 삽입
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // csrf 에 대응하는 xsrf-token을 발행하거나 해당 토큰을 확인
            \App\Http\Middleware\VerifyCsrfToken::class,
            // eloquent 모델에 결합시켜 루트에 이용된 id등으로 부터 데이터베이스 검색을 수행해
            // 컨트롤러 클래스나 루트등에서 이용할수 있도록 하는 미들웨어
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        //    \App\Http\Middleware\Checkuser::class,

        ],

        'api' => [

            // api 요청에 적용되는 미들웨어 그룹
            // 메일 주소로 인증된 사용자만 접근을 인가하는 미들웨어
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            // 동일 사용자가 단위시간내 규정 횟수 이상 접속 여부를 판정하는 미들웨어
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            // eloquent 모델에 결합시켜 루트에 이용된 id등으로 부터 데이터베이스 검색을 수행해 
            // 컨트롤 클래스나 루트 등에서 이용할 수 있는 미들웨어
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     *  미들웨어에 별칭을 할당하여 라우트나 그룹에 더 간편하게 미들웨어를 적용할 수 있게 해줍니다. 
     * 예를 들어, 'auth'는 인증 미들웨어를, 'throttle'은 요청 제한 미들웨어를 지칭
     */
    protected $middlewareAliases = [

        // 미들웨어 별칭 정의
        // 인증 미들웨어
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        // etag를 이용해 콘텐츠의 캐시를 제어
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        // 특정 모델이나 리소스로의 액션을 인가하는 미들웨어
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        // 인증되지 않은 사용자만 접근을 허용하며, 로그인되어 있으면 사용자를 지정된 위치로 리디렉션합니다.
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // 사용자가 암호화된 페이지에 액세스할 때 패스워드를 확인합니다.
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        // 사전지식적 요청: 페이지 프리로드를 통해 사용자가 요청하기 전에 서버가 요청을 처리하는 방식의 미들웨어입니다.
        'precognitive' => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
        // 요청이 서명되지 않은 경우, 요청이 거부됩니다.
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        // 과도한 요청을 방지하기 위해 요청 속도를 제한하는 역할을 합니다. 이는 서버에 대한 공격을 방지하고 서버 리소스를 보호하기 위해 사용됩니다.
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        // 이메일 주소가 확인되었는지 확인하고, 확인되지 않은 사용자가 특정한 기능에 접근하는 것을 막습니다.
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

    ];
}
