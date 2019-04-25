<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnFluidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turn_fluids', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->enum('type', array_keys(__('app.selects.turn_fluids.types')));
            $table->decimal('total');
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
        Schema::dropIfExists('turn_fluids');
    }
}
