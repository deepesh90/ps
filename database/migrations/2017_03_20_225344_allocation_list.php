<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllocationList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('allocationlist', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('name',255);
    		$table->integer('allocation_pcrhead_id');
    		$table->integer('allocation_subhead_id');
    		$table->integer('allocation_head_id');
    		 
    		 
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
