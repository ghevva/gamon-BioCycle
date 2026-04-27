<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // WAJIB karena kamu pakai 'booking' bukan 'bookings'
    protected $table = 'booking';

    // BIAR BISA INSERT DATA
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'volume',
        'weight',
        'date',
        'time',
        'queue_number'
    ];
}