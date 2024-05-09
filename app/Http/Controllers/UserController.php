<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /**
     * 사용자의 상세 정보 페이지를 View 객체로 반환합니다.
     * 이 메소드는 단순히 뷰를 반환하며, 특별한 HTTP 헤더 설정이 필요하지 않습니다.
     * @param string $id 사용자 ID
     * @return View 사용자 상세 정보 뷰
     */
    public function showView(string $id): View
    {
        /* 'user.detail' 뷰에 'userId' 데이터를 전달하여 반환 */
        return view('user.detail', ['userId' => $id]);
    }

    /**
     * 사용자의 상세 정보 페이지를 HTTP Response 객체로 반환합니다.
     * 이 메소드는 응답에 추가 HTTP 헤더를 설정할 수 있으며,
     * 필요에 따라 캐시 정책, 콘텐츠 유형, 쿠키 등을 구성할 수 있습니다.
     * @param string $id 사용자 ID
     * @return Response 사용자 상세 정보 페이지를 포함하는 HTTP 응답
     */
    public function showResponse(string $id): Response
    {
        
        // 'user.detail' 뷰를 렌더링
        $content = view('user.detail', ['userId' => $id])->render();

        // HTTP 상태 코드 201(Created)와 함께 응답 생성

        return response($content, 201)
        /* 'Content-Type' 헤더를 설정하여 응답의 MIME 유형을 'text/html'로 명시.
            - Multipurpose Internet Mail Extensions 다목적 인터넷 메일 확장 
            - 다양한 종류의 데이터를 표현하고 전송하는데 사용되는 표 준형식
        */
        ->header('Content-Type', 'text/html')
        /* 'Cache-Control' 헤더를 통해 캐시 방지 정책을 설정. 저장되지 않고, 인증된 사용자만 콘텐츠에 접근할 수 있도록 함.
            - no-store: 응답을 저장하지 않고 캐시에 저장하지 않아야함.
            - no-cache: 클라이언트가 캐시된 응답을 사용하기전에 서버에 확인을 요청해야함
            - must-revalidate: 캐시된 응답이 만료되면 클라이언트는 해당 응답을 서버에 재확인해야함
            - private: 캐시된 응답은 해당 응답을 받은 클라이언트만 사용할 수 있음
        */
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, private')
        /* 'Content-Security-Policy' 헤더를 설정하여 XSS 공격으로부터 보호
            이 정책은 스크립트, 이미지 등의 리소스 로드를 현재 도메인('self')으로 제한하며, 일부 외부 도메인에서 이미지를 로드할 수 있도록 함.
            - default-src 'self' :
              기본소스를 정의하는 지시자
              self는 현재 웹페이지의 출처
            - img-src https://* : 
              이미지 리소스에 대한 출처를 지정하는 지시자
              HTTPS프로토콜을 사용하는 모든 출처의 이미지가 허용됨
            - child-src 'none'; 
              프레임 및 객체에서 로드 될 수 있는 리소스의 출처를 정의하는 지시자 
        */
         ->header('Content-Security-Policy', "default-src 'self'; img-src https://*; child-src 'none';")
        /* 'X-XSS-Protection' 헤더를 설정하여 브라우저의 XSS 필터를 활성화, 이는 사용자로부터의 스크립트 공격을 차단
            '1; mode=block': 브라우저 내장 xss필터 활성화, xss 공격을 감지하면 페이지 렌더링을 차단하도록 지시
         */
        ->header('X-XSS-Protection', '1; mode=block')
        /* 'Strict-Transport-Security' 헤더를 설정하여 HTTPS를 통한 접속만 허용
            중간자 공격을 방지하는 데 유용
            - max-age=31536000 브라우저는 이 헤더를 수신한 후 1년 동안 해당 사이트에 대한 HTTPS 강제를 기억
            - includeSubDomains : 모든 서브도메인에서도 HTTPS강제가 적용  
        */
        ->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
    }
}
