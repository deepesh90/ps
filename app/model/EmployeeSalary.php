<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    //
    public $table='employee_salary';
    protected $dates = ['effective_date','created_at'];
}
