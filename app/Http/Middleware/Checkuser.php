<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Checkuser
{
    /**
     * Handle an incoming request.
     * php artisan make:middleware Checkuser

     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        echo "Checkuser Middleware<br>미들웨어가 이 경로에 적용되었습니다.";
        return $next($request);
    }
}
