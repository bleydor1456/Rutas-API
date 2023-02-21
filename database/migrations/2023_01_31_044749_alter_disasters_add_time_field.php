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
        Schema::table('disasters', function(Blueprint $table){
            $table->time('time')->after('damage_level_id');
            $table->date('date')->after('damage_level_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disasters', function(Blueprint $table){
            $table->dropColumn('time');
            $table->dropColumn('date');
        });
    }
};
