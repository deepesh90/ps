<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Currencyrates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('Currencyrates', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->double('rate');
    		$table->date('effective_date');
    		$table->integer('currency_id');
    		
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
