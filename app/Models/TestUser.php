<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    use HasFactory;
    protected $table = 'testusers';  // 연결할 테이블 지정
    protected $fillable = ['username', 'email'];  // 대량 할당 가능한 속성 지정
}