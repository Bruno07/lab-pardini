<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatientContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number', 25);
            $table->string('type', 25);
            $table->bigInteger('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_contacts');
    }
}
