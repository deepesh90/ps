<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeHierarchy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('employee_heirarchy', function (Blueprint $table) {
    		$table->increments('id');
    		$table->dateTime('effective_date');
    	
    	});
    	Schema::create('employee_stucture', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->bigInteger('employee_id');
    		$table->bigInteger('parent_employee_id');
    		$table->bigInteger('employee_heirarchy_id');    	
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
