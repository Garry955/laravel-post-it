<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Friend extends Pivot
{
    use HasFactory;

    protected $fillable = ['friend_id','user_id','accepted','status', 'friends_since'];

    protected $casts = ['created_at', 'updated_at'];

    protected $guarding = [];

}
