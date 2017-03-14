<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectFte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('projectftes', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->date('start_date');
    		$table->date('end_date');
    		$table->integer('project_id');
    		$table->integer('employee_id');
    		$table->integer('rep_id');
    		$table->string('project_location',255);
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
