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
        Schema::create('gym_member_training_session', function (Blueprint $table) {
            $table->unsignedBigInteger('gym_member_id');
            $table->foreign('gym_member_id')->references('user_id')->on('gym_members')->onDelete('cascade');

            $table->unsignedBigInteger('training_session_id');
            $table->foreign('training_session_id')->references('id')->on('training_sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_member_training_session');
    }
};
