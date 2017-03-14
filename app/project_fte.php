<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project_fte extends Model
{
    //
    public $table='projectftes';
    public $timestamps=false;
    protected $dates = ['start_date','end_date'];
    
}
