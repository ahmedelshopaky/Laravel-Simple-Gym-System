<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar_image')->nullable();
            $table->timestamps();
            $table->string('email')->unique();
            $table->string('name')->nullable();
            $table->bigInteger('national_id')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('stripe_id')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
