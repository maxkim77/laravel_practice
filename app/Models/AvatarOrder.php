<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvatarOrder extends Model
{
    use HasFactory;

    protected $table = 'avatar_orders';
    protected $fillable = ['user_id', 'avatar_ordered', 'order_date'];

    public function user()
    {
        return $this->belongsTo(TestUser::class, 'user_id');
    }
}
