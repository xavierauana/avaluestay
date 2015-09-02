<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankinfo', function (Blueprint $table) {
            $table->increments('id');

            $table->string('bank_name');
            $table->string('bank_address');
            $table->string('acct_name');
            $table->string('acct_number');
            $table->string('iban');
            $table->string('swift_code');

            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')
                ->references('id')->on('properties')
                ->onDelete('cascade');

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
        Schema::drop('bankinfo');
    }
}
