<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turn_medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->string('medicine_name', 50);
            $table->decimal('dose');
            $table->string('unit', 25);
            $table->enum('route', array_keys(__('app.selects.turn_medicines.routes')));
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
        Schema::dropIfExists('turn_medicines');
    }
}
