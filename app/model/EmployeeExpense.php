<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class EmployeeExpense extends Model
{
    //
	public $table='employee_expenses';
	public $timestamps=false;
	protected $dates = ['expense_date'];
}
