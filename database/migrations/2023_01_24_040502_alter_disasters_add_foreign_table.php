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
        Schema::table('disasters', function(Blueprint $table) {
            $table->foreign('disaster_type_id')->references('id')->on('disaster_types');
            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::table('disasters', function(Blueprint $table) {
            $table->dropForeign('disasters_disaster_type_id_foreign');
            $table->dropForeign('disasters_city_id_foreign');
            $table->dropForeign('disasters_damage_level_id_foreign');    
        });
    }
};
