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
            $table->enum('document_type', array_keys(__('app.selects.person.document_type')));
            $table->string('document', 12)->unique();
            $table->string('name', 50);
            $table->string('last_name', 50);
            $table->date('birth_date');
            $table->enum('sex', array_keys(__('app.selects.person.sex')));
            $table->enum('civil_status', array_keys(__('app.selects.person.civil_status')));
            $table->string('address', 50);
            $table->string('neighborhood', 50);
            $table->string('phone', 15)->nullable();
            $table->string('cellphone', 15)->nullable();
            $table->string('email')->unique();
            $table->string('title', 100);
            $table->enum('title_type', array_keys(__('app.selects.professional.title_type')));
            $table->string('collage', 100);
            $table->string('year', 4);
            $table->boolean('active')->default(1);
            $table->unsignedInteger('professional_specialty_id');
            $table->foreign('professional_specialty_id')->references('id')->on('professional_specialties');
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
        Schema::dropIfExists('professionals');
    }
}
