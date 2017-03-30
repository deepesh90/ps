<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectInputActual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('project_input_actual', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->string('name');
    		$table->double('value');
    		$table->tinyInteger('month');
    		$table->integer('year');
    		$table->integer('project_id');
    		$table->string('type');
    		$table->text('descripton');
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
