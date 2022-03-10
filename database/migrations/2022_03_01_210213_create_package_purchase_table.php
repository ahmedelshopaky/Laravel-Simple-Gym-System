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
        Schema::create('package_purchase', function (Blueprint $table) {
            $table->unsignedBigInteger('gym_member_id');
            $table->foreign('gym_member_id')->references('user_id')->on('gym_members')->onDelete('cascade');

            $table->unsignedBigInteger('gym_id');
            $table->foreign('gym_id')->references('id')->on('gyms')->onDelete('cascade');

            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('training_packages')->onDelete('cascade');

            $table->double('amount_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_purchase');
    }
};
