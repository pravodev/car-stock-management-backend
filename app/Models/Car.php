<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'price',
        'stock',
        'seat',
        'engine',
        'hourse_power'
    ];
}
