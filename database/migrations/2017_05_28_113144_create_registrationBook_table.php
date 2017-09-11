<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrationBook', function (Blueprint $table) {
            $table->increments('runningNumber');
            $table->string('id13');
            $table->integer('ranking');
            $table->string('addressNo');
            $table->string('rank');
            $table->string('name');
            $table->string('sname');
            $table->string('sex');
            $table->date('birthdate');
            $table->date('movieInDate');
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
        //
    }
}
