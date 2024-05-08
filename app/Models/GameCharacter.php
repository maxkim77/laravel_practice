<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCharacter extends Model
{
    use HasFactory;

    protected $table = 'game_characters';  // 연결할 테이블 지정
    protected $fillable = ['user_id', 'character_name', 'level'];  // 대량 할당 가능한 속성 지정

    public function user()
    {
        return $this->belongsTo(TestUser::class, 'user_id');
    }
}
