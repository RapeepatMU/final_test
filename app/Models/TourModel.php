<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourModel extends Model
{
    protected $table = 'tour';
    protected $fillable = [
        'tour_name','status','pay_date','start_round','end_round','tour_price','num_people','country','city','note'

    ];
}
