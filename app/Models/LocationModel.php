<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    protected $table = 'locationr';
    protected $fillable = [
        'country', 'city'

    ];
}
