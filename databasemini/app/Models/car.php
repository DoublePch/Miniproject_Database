<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Unique;

class car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_name',
        'car_price',
        'car_image',
        'car_type',
        'car_id',
        'car_brand',
        'car_status',
    ];
}
