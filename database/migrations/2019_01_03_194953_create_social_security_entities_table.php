<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialSecurityEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_security_entities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 12)->unique();
            $table->string('nit', 12);
            $table->string('name', 150);
            $table->enum('type', array_keys(__('app.selects.social_security_entities.type')));
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
        Schema::dropIfExists('social_security_entities');
    }
}
