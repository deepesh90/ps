<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Currency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('currencys', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->string('currency_name');
    		$table->text('currency_symbol');
    		$table->string('currency_code');
    		$table->string('is_default');
    		$table->string('status');
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
