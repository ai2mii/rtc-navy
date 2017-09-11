<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationPerNoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrationPerNo', function (Blueprint $table) {
            $table->increments('runningNumber');
            $table->string('addressNo');
            $table->string('id13');
            $table->string('rank');
            $table->string('name');
            $table->string('sname');
            $table->string('remark');
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
