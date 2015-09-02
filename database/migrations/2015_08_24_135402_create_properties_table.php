<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');

            /**
             * Property dependencies. Other must have table/information
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('propertyType_id')->unsigned();
            $table->foreign('propertyType_id')
                ->references('id')->on('propertyTypes')
                ->onDelete('cascade');
            $table->integer('bedType_id')->unsigned()->default(1);
            $table->foreign('bedType_id')
                ->references('id')->on('bedTypes')
                ->onDelete('cascade');
            $table->integer('roomType_id')->unsigned()->default(1);
            $table->foreign('roomType_id')
                ->references('id')->on('roomTypes')
                ->onDelete('cascade');
            $table->integer('currency_id')->unsigned();
            $table->foreign('currency_id')
                ->references('id')->on('currencies')
                ->onDelete('cascade');
            $table->integer('commission_id')->unsigned();
            $table->foreign('commission_id')
                ->references('id')->on('commission_tiers')
                ->onDelete('cascade');

            /**
             * Property own information
             */
            $table->integer('accommodates')->default(1);
            $table->integer('bedrooms')->default(0);
            $table->integer('beds')->default(1);
            $table->string('name');
            $table->text('summary');
            $table->text('address1');
            $table->text('address2');
            $table->text('address3');
            $table->string('city')->index();
            $table->string('country');
            $table->integer('price');
            $table->string('approvalStatus')->default('pending');
            $table->string('listingStatus')->default('unlisted');
            $table->text('locationDescription');
            $table->timestamp('checkIn');
            $table->timestamp('checkOut');

            $table->timestamps();
        });


        Schema::create('facility_property', function (Blueprint $table) {
            $table->integer('facility_id')->unsigned();
            $table->foreign('facility_id')
                ->references('id')->on('facilities')
                ->onDelete('cascade');

            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')
                ->references('id')->on('properties')
                ->onDelete('cascade');
        });

        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')
                ->references('id')->on('properties')
                ->onDelete('cascade');
            $table->string('path');
            $table->string('link');
            $table->string('fileName');
            $table->string('type');
            $table->string('tag');
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
        Schema::drop('media');
        Schema::drop('facility_property');
        Schema::drop('properties');
    }
}
