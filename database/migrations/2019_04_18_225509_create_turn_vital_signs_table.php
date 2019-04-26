<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnVitalSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turn_vital_signs', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->integer('TA_S');
            $table->integer('TA_D');
            $table->integer('FR');
            $table->integer('FC');
            $table->integer('SPO2');
            $table->decimal('T');
            $table->string('observations', 200)->nullable();
            $table->unsignedInteger('turn_id');
            $table->foreign('turn_id')->references('id')->on('turns');
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
        Schema::dropIfExists('turn_vital_signs');
    }
}
