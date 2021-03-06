<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turn_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->string('observations', 200);
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
        Schema::dropIfExists('turn_notes');
    }
}
