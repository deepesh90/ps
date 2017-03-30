<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllocationPcrHead extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('allocation_pcrhead', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('allocation_pcr_name',255);
    		$table->string('allocation_pcr_status',255);
    		$table->integer('allocation_subhead_id');
    		
    	
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
