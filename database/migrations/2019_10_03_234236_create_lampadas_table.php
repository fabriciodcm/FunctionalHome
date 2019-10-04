<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLampadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lampadas', function (Blueprint $table) {
            $table->bigIncrements('idLampada');
            $table->bigInteger('idComodo')->unsigned();
            $table->string('nomeLampada',45);
            $table->string('voltagemLampada',10);

            $table->timestamps();
        });

        Schema::table('lampadas', function($table)
        {
            $table->foreign('idComodo')
            ->references('idComodo')->on('comodos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lampadas');
    }
}
