<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 80);
            $table->date('birth');
            $table->string('last_name', 100);
            $table->string('email', 200);
            $table->timestamps();
            $table->softDeletes();
        });

        \DB::update("ALTER TABLE patients AUTO_INCREMENT = 10000000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
