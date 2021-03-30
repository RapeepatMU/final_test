<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    protected $table = 'registercreate';
    protected $fillable = [
        'cus_name', 'status', 'paid', 'tour_id', "balance"

    ];
}
