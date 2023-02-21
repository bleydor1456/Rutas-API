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
        Schema::create('disaster_service_damage_level', function (Blueprint $table) {
            $table->unsignedBigInteger('disaster_id');
            $table->unsignedBigInteger('public_service_id');
            $table->unsignedBigInteger('damage_level_id');

            $table->foreign('disaster_id')->references('id')->on('disasters');
            $table->foreign('public_service_id')->references('id')->on('public_services');
            $table->foreign('damage_level_id')->references('id')->on('damage_levels');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disaster_service_damage_level');
    }
};
