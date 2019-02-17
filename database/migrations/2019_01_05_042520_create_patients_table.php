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
            $table->enum('document_type', array_keys(__('app.selects.person.document_type')));
            $table->string('document', 12)->unique();
            $table->string('name', 50);
            $table->string('last_name', 50);
            $table->date('birth_date');
            //$table->unsignedInteger('city_id');
            //$table->foreign('city_id')->references('id')->on('cities');
            $table->enum('sex', array_keys(__('app.selects.person.sex')));
            $table->enum('civil_status', array_keys(__('app.selects.person.civil_status')));
            $table->string('address', 50);
            $table->string('neighborhood', 50);
            //$table->unsignedInteger('address_city_id');
            //$table->foreign('address_city_id')->references('id')->on('cities');
            $table->string('phone', 15)->nullable();
            $table->string('cellphone', 15)->nullable();
            $table->boolean('allergies')->default(0);
            $table->string('allergies_description', 200)->nullable();
            $table->boolean('medication_allergies')->default(0);
            $table->string('medication_allergies_description', 200)->nullable();
            $table->boolean('medicines')->default(0);
            $table->string('medicines_description', 200)->nullable();
            $table->boolean('active')->default(1);
            $table->unsignedInteger('social_security_entity_id');
            $table->foreign('social_security_entity_id')->references('id')->on('social_security_entities');
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
        Schema::dropIfExists('patients');
    }
}
