<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('start', 8);
            $table->string('end', 8);
            $table->string('observations', 200);
            $table->enum('state',  array_keys(__('app.selects.medical_appointment.state')))->default('PENDIENTE');
            $table->unsignedInteger('professional_id');
            $table->foreign('professional_id')->references('id')->on('professionals');
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
        Schema::dropIfExists('medical_appointments');
    }
}
