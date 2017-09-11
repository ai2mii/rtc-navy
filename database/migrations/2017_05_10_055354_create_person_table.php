<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->increments('runningNumber');
            $table->string('id');
            $table->string('rank');
            $table->string('name');
            $table->string('sname');
            $table->string('id13');
            $table->string('corps');
            $table->string('line');
            $table->string('start');
            $table->string('level');
            $table->integer('salary');
            $table->string('withdraw');
            $table->date('birthdate');
            $table->date('militaryServiceDate');
            $table->date('getRankDate');
            $table->integer('retiredYears');
            $table->string('emoluments');
            $table->date('takePositionDate');
            $table->date('militaryRegistrationDate');
            $table->date('memberDate');
            $table->string('currentPosition');
            $table->string('under');
            $table->string('positionCode');
            $table->string('positionCode12');
            $table->string('workLocationCode');
            $table->string('workPositionCode');
            $table->integer('afaps');
            $table->string('education');
            $table->string('militaryEducation');
            $table->string('cgsc');
            $table->string('insignia');
            $table->date('beforeRankDate');
            $table->double('assessmentAvg',10,2);
            $table->string('religion');
            $table->string('bloodType');
            $table->integer('height');
            $table->integer('weight');
            $table->double('bmi',10,2);
            $table->date('health');
            $table->string('addressNo');
            $table->string('disbursement');
            $table->string('profileBook');
            $table->string('trainingResults');
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
