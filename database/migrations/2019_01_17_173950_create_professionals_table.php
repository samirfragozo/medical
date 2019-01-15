<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->enum('title_type', array_keys(__('app.selects.professional.title_type')));
            $table->string('collage', 100);
            $table->string('year', 4);
            $table->unsignedInteger('professional_specialty_id');
            $table->foreign('professional_specialty_id')->references('id')->on('professional_specialties');
            $table->unsignedInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people');
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
        Schema::dropIfExists('professionals');
    }
}
