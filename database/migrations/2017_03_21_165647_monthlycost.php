<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Monthlycost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('monthlycost', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->bigInteger('allocation_head_id');
    		$table->bigInteger('allocation_subhead_id');
    		$table->bigInteger('allocation_pcrhead_id');
    		$table->bigInteger('allocationlist_id');
    		$table->text('description');
    		$table->double('total_amt');
    		$table->double('adjustment');
    		$table->string('adjustment_type',255);
    		$table->double('final_amt');
    		$table->integer('month');
    		$table->integer('year');
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
