<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CoinMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin', function (Blueprint $table) {
            $table->increments('id');
			$table->string('country');
			$table->integer('year');
			$table->integer('relative_value');
			$table->integer('status');
            $table->timestamps();
			
			//Relationship with Currency table
			$table->integer('currency_id')->unsigned();
			$table->foreign('currency_id')->references('id')->on('currency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coin');
    }
}
