<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('allergies')->default(0);
            $table->string('allergies_description', 200)->nullable();
            $table->boolean('medication_allergies')->default(0);
            $table->string('medication_allergies_description', 200)->nullable();
            $table->boolean('medicines')->default(0);
            $table->boolean('active')->default(1);
            $table->string('medicines_description', 200)->nullable();
            $table->unsignedInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people');
            $table->unsignedInteger('social_security_entity_id');
            $table->foreign('social_security_entity_id')->references('id')->on('social_security_entities');
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
        Schema::dropIfExists('patients');
    }
}
