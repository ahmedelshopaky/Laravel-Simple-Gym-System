<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_managers', function (Blueprint $table) {
            $table->id();
            $table->integer('national_id')->unique();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('password');
            $table->string('avatar_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_managers');
    }
};
