<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TestUserController extends Controller
{
    // 프로시저 사용
    public function selectUserProcedure()
    {
        // 프로시저 인자 초기화
        DB::statement("SET @execution_time = 0");

        // 프로시저 호출
        $result = DB::select('CALL GetUserCharacterAvatarInfo(@execution_time)');

        // 프로시저 실행 시간 조회
        $executionTimeProcedure = DB::select("SELECT @execution_time AS execution_time")[0]->execution_time;

        // 프로시저 실행 시간 포맷팅
        $formattedExecutionTimeProcedure = sprintf("%.6f seconds", $executionTimeProcedure);

        return view('user.select', compact('formattedExecutionTimeProcedure', 'result'));
    }

    // ORM 사용
    public function selectUserOrm()
    {
        // ORM 실행 시간 측정 시작
        $startTime = microtime(true);
    
        // ORM을 통해 사용자 정보 조회
        $users = \App\Models\TestUser::with('gameCharacters', 'avatarOrder')->get();
    
        // ORM 실행 시간 측정 종료
        $endTime = microtime(true);
    
        // ORM 실행 시간 계산
        $executionTimeOrm = $endTime - $startTime;
    
        // ORM 실행 시간 포맷팅
        $formattedExecutionTimeOrm = sprintf("%.6f seconds", $executionTimeOrm);
    
        return view('user.select', compact('formattedExecutionTimeOrm', 'users'));
    }
}
