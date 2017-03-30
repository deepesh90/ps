<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MonthlycostEmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('monthlycostemp', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->double('other_payout');
    		$table->double('travel');
    		$table->integer('month');
    		$table->integer('year');
    		$table->integer('rep_id');
    		$table->integer('employee_id');
    		$table->integer('project_id');
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
