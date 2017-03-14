<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class employee_heirarchy extends Model
{
    //
    public $table='employee_heirarchy';
    public $timestamps=false;
    protected $dates = ['effective_date'];
    
}
