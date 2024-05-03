<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testusers', function (Blueprint $table) {
            $table->id();
            $table->string('username'); // 사용자 이름 컬럼
            $table->string('email')->unique(); // 이메일 컬럼 (중복 불가)
            $table->timestamps(); // 자동으로 생성 및 업데이트 시간 기록
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testusers');
    }
}
