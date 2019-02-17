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
            $table->enum('document_type', array_keys(__('app.selects.person.document_type')));
            $table->string('document', 12)->unique();
            $table->string('name', 50);
            $table->string('last_name', 50);
            $table->enum('sex', array_keys(__('app.selects.person.sex')));
            $table->string('address', 50)->nullable();
            $table->string('neighborhood', 50)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('cellphone', 15)->nullable();
            $table->enum('relationship', array_keys(__('app.selects.relative.relationship')));
            $table->unsignedInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
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
        Schema::dropIfExists('relatives');
    }
}
