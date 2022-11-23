<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookingcar extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'car_id',
        'car_brand',
        'idname',
        'fname',
        'lname',
    ];
}
