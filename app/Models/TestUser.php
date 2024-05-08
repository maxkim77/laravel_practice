<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    use HasFactory;

    protected $table = 'testusers';
    protected $fillable = ['username', 'email'];

    public function gameCharacters()
    {
        return $this->hasMany(GameCharacter::class, 'user_id');
    }

    public function avatarOrder()
    {
        return $this->hasOne(AvatarOrder::class, 'user_id');
    }
}
