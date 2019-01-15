<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatives', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('relationship', array_keys(__('app.selects.relative.relationship')));
            $table->unsignedInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people');
            $table->unsignedInteger('patient_id');
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
        Schema::dropIfExists('relatives');
    }
}
