<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	//
    	Schema::create('customers', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('customer_id',255);
    		$table->string('customer_name',255);
    		$table->string('website',255)->nullable();
    		$table->string('phone_no',255)->nullable();
    		$table->string('address_line_1',255);
    		$table->string('address_line_2',255)->nullable();
    		$table->integer('state_id');
    		$table->integer('country');
    		$table->string('zip_code',255);
    		$table->integer('p3_contact_person');
    		
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
