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
    
        DB::statement("SET @startTime = NOW(6)");  // 마이크로초 정밀도 설정
        $result = DB::select('CALL SelectUser(?, @executionTime)', [$username]);
        DB::statement("SET @endTime = NOW(6)");  // 마이크로초 정밀도 설정
        DB::statement("SET @executionTime = TIMESTAMPDIFF(MICROSECOND, @startTime, @endTime) / 1000000.0");
        $executionTimeProcedure = DB::select("SELECT @executionTime AS executionTime")[0]->executionTime;
    
        // 소수점 이하 자릿수 포맷팅
        $formattedExecutionTimeProcedure = sprintf("%.6f seconds", $executionTimeProcedure);
    
        return view('user.select', compact('formattedExecutionTimeProcedure'));
    }
    
// ORM 사용
public function selectUserOrm()
{
    $username = 'JohnDoe';

    $startTime = microtime(true);
    $user = TestUser::where('username', $username)->first();
    $endTime = microtime(true);
    $executionTimeOrm = $endTime - $startTime;

    // 밀리세컨드로 변환 후 포맷팅
    $formattedExecutionTimeOrm = sprintf("%.6f seconds", $executionTimeOrm);

    return view('user.select', compact('formattedExecutionTimeOrm'));
}



}
