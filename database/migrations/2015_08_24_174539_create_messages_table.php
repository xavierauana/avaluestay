<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sender_id')->unsigned();
            $table->foreign('sender_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('receiver_id')->unsigned();
            $table->foreign('receiver_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->text('message');

            $table->boolean('read')->default(0);

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
        Schema::drop('messages');
    }
}
