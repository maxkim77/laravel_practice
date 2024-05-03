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
                ->header('Content-Type', 'text/html')
                ->header('Cache-Control', 'no-store, no-cache, must-revalidate, private')
                // 웹 페이지에서 스크립트, 스타일시트, 이미지, 비디오 등의 리소스가 로드될 수 있는 출처를 제한함으로써 XSS(크로스 사이트 스크립팅) 공격을 방지할 수 있습니다.
                ->header('Content-Security-Policy', "default-src 'self'; img-src https://*; child-src 'none';")
                // 브라우저의 XSS 필터를 활성화하여 사용자로부터의 스크립팅 공격을 차단합니다.
                ->header('X-XSS-Protection', '1; mode=block')
                // 웹 사이트가 HTTPS를 통해서만 접속되도록 강제합니다. 이는 중간자 공격을 방지하는 데 유용합니다.
                ->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
    }
}
