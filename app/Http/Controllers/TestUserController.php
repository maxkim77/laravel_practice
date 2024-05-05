<?php
namespace App\Http\Controllers;

use App\Models\TestUser;
use Illuminate\Support\Facades\DB;

class TestUserController extends Controller
{
    // 프로시저 사용
    public function selectUser()
    {
        $username = 'JohnDoe';
    
        // 프로시저 실행 전 현재 시간 기록
        DB::statement("SET @startTime = NOW(6)");  // 마이크로초 정밀도 설정
        // 프로시저 호출
        $result = DB::select('CALL SelectUser(?, @executionTime)', [$username]);
        // 프로시저 실행 후 현재 시간 기록
        DB::statement("SET @endTime = NOW(6)");  // 마이크로초 정밀도 설정
        // 프로시저 실행 시간 계산
        DB::statement("SET @executionTime = TIMESTAMPDIFF(MICROSECOND, @startTime, @endTime) / 1000000.0");
        // 계산된 실행 시간 조회
        $executionTimeProcedure = DB::select("SELECT @executionTime AS executionTime")[0]->executionTime;
    
        // 실행 시간 포맷팅하여 뷰로 전달
        $formattedExecutionTimeProcedure = sprintf("%.6f seconds", $executionTimeProcedure);
    
        return view('user.select', compact('formattedExecutionTimeProcedure'));
    }
    
    // ORM 사용
    public function selectUserOrm()
    {
        $username = 'JohnDoe';

        // ORM을 이용하여 데이터베이스에서 레코드를 조회하기 전 현재 시간 기록
        $startTime = microtime(true);
        // ORM을 이용하여 데이터베이스에서 레코드 조회
        $user = TestUser::where('username', $username)->first();
        // 데이터베이스에서 레코드 조회 후 현재 시간 기록
        $endTime = microtime(true);
        // 조회 소요 시간 계산
        $executionTimeOrm = $endTime - $startTime;

        // 조회 소요 시간 포맷팅하여 뷰로 전달
        $formattedExecutionTimeOrm = sprintf("%.6f seconds", $executionTimeOrm);

        return view('user.select', compact('formattedExecutionTimeOrm'));
    }
}