<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather_model extends Model
{

    protected $table = 'weather_infor';
    protected $fillable = [
        'country',
        'city',
        'latitude',
        'longitude',
        'altitude',
    ];
}
