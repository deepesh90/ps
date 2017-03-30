<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeExpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('employee_expenses', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->double('expense_cost');
    		$table->text('description');
    		$table->integer('employee_id');
    		$table->date('expense_date');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    	Schema::drop('employee_salary');
    }
}
