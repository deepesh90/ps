<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Userrole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('userrole', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->string('role_name');
    		$table->longText('permission');
    		$table->integer('company_id')->nullable;
    		$table->string('is_admin');
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
