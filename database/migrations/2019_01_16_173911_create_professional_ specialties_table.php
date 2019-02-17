<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_specialties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',10)->unique();
            $table->string('name',50)->unique();
            $table->string('description',200)->nullable();
            $table->boolean('active')->default(1);
            $table->unsignedInteger('professional_type_id');
            $table->foreign('professional_type_id')->references('id')->on('professional_types');
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
        Schema::dropIfExists('professional_specialties');
    }
}
