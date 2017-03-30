<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllocationSubHead extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('allocation_subhead', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('allocation_subhead_name',255);
    		$table->integer('allocation_head_id');
    		$table->string('allocation_subhead_status',255);
    	
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
