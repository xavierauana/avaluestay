<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('payee_id')->unsigned();
            $table->foreign('payee_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('seller_id')->unsigned();
            $table->foreign('seller_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->double("amount", 15, 3);
            $table->integer("currency_id")->unsigned()->default(env("BASE_CURRENCY_CODE"));
            $table->foreign('currency_id')
                ->references('id')->on('currencies')
                ->onDelete('cascade');

            $table->string("orderRef")->index();
            $table->string("status")->default("pending");

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
        Schema::drop('invoices');
    }
}
