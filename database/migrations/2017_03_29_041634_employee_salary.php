<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeSalary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('employee_salary', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->double('salary_ctc');
    		$table->double('salary_monthly');
    		$table->integer('employee_id');
    		$table->date('effective_date');
    		$table->integer('user_id');
    		$table->timestamps();
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
    }
}
