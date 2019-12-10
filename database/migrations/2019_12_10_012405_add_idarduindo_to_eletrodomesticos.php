<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdarduindoToEletrodomesticos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eletrodomesticos', function (Blueprint $table) {
            $table->char('idArduino', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eletrodomesticos', function (Blueprint $table) {
            $table->dropColumn('idArduino');
        });
    }
}
