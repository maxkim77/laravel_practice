<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 특정 데이터베이스를 스키마에 따라 생성하기위해
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // id 컬럼을 자동으로 생성
            $table->string('subject',255);  // varchar(255) 타입의 subject 컬럼 생성
            $table->text('content'); // text 타입의 content 컬럼 생성
            $table->timestamps(); // created_at, updated_at 컬럼을 자동으로 생성
        });
    }

    /**
     * Reverse the migrations.
     * 롤백을 실행할때 사용합니다.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
