<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationBook2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrationBook2', function (Blueprint $table) {
            $table->increments('runningNumber');
            $table->string('id13');
            $table->string('rank');
            $table->string('name');
            $table->string('sname');
            $table->string('type');
            $table->string('otherHouse');
            $table->string('addressNo');
            $table->string('moo');
            $table->string('tambon');
            $table->string('aumphoe');
            $table->string('province');
            $table->integer('numberAll');
            $table->integer('numberOver17');
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
