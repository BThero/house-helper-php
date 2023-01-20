<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->foreignId('city_id')->nullable()->constrained('cities');
        });
    }

    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->dropColumn('city_id');
        });
    }
};
