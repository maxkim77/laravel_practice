<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     * 쿠키 암호화 미들웨어
     * 쿠키데이터가 외부에 노출되는 것을 방지
     * 암호화되지 않아야 하는 쿠키의 이름
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
