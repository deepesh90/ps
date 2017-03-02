<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('projects', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('project_name',255);
    		$table->integer('customer_id');
    		$table->date('start_date');
    		$table->date('end_date');
    		$table->integer('project_manager_id');
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
