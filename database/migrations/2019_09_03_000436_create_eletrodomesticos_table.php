<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEletrodomesticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eletrodomesticos', function (Blueprint $table) {
            $table->bigIncrements('idEletrodomestico');
            $table->bigInteger('idComodo')->unsigned();
            $table->string('nomeEletrodomestico',45);
            $table->string('voltagemEletrodomestico',10);

            
            $table->timestamps();
        });
//alter table `eletrodomesticos` add constraint `eletrodomesticos_idcomodo_foreign` foreign key (`idComodo`) references `comodos` (`idComodo`) on delete cascade
        Schema::table('eletrodomesticos', function($table)
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
        Schema::dropIfExists('eletrodomesticos');
    }
}
