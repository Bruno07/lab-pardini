<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatientAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('postal_code', 25);
            $table->string('address', 100);
            $table->string('number', 10);
            $table->string('neighborhood', 100);
            $table->string('town', 100);
            $table->string('state', 100);
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
        Schema::dropIfExists('patient_addresses');
    }
}
