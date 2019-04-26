<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turn_supplies', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->decimal('quantity');
            $table->string('unit', 25);
            $table->string('observations', 200)->nullable();
            $table->unsignedInteger('supply_id');
            $table->foreign('supply_id')->references('id')->on('supplies');
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
        Schema::dropIfExists('turn_supplies');
    }
}
