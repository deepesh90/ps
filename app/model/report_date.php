<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class report_date extends Model
{
    //
    public $table='report_date';
    public $timestamps=false;
    protected $dates = ['from_date','to_date'];
}
