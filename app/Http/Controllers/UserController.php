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
        // 'user.detail' 뷰에 'userId' 데이터를 전달하여 반환
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
        // 'Content-Type' 헤더를 'text/html'로 명시적으로 설정
        return response($content, 201)
        // 'Content-Type' 헤더를 설정하여 응답의 MIME 유형을 'text/html'로 명시합니다.
        ->header('Content-Type', 'text/html')
        // 'Cache-Control' 헤더를 통해 캐시 방지 정책을 설정합니다. 저장되지 않고, 인증된 사용자만 콘텐츠에 접근할 수 있도록 합니다.
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, private')
        // 'Content-Security-Policy' 헤더를 설정하여 XSS 공격으로부터 보호합니다. 이 정책은 스크립트, 이미지 등의 리소스 로드를 현재 도메인('self')으로 제한하며, 일부 외부 도메인에서 이미지를 로드할 수 있도록 합니다.
        ->header('Content-Security-Policy', "default-src 'self'; img-src https://*; child-src 'none';")
        // 'X-XSS-Protection' 헤더를 설정하여 브라우저의 XSS 필터를 활성화시킵니다. 이는 사용자로부터의 스크립트 공격을 차단합니다.
        ->header('X-XSS-Protection', '1; mode=block')
        // 'Strict-Transport-Security' 헤더를 설정하여 HTTPS를 통한 접속만 허용합니다. 이는 중간자 공격을 방지하는 데 유용합니다.
        ->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
    }
}
