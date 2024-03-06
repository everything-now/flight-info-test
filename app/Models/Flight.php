<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $casts = [
        'departure_date_time' => 'datetime',
        'arrival_date_time' => 'datetime',
    ];
}
