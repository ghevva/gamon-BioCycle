<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RewardHistory extends Model
{
    protected $table = 'reward_history';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'points_used',
        'status'
    ];
}