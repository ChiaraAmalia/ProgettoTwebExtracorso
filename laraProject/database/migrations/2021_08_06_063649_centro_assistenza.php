<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CentroAssistenza extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centroAssistenza', function (Blueprint $table){
            $table->bigIncrements('codice_centro')->unsigned()->index();
            $table->string('nome_centro',200);
            $table->string('indirizzo');
            $table->string('citta');
            $table->Integer('cap');
            $table->Integer('telefono');
            $table->enum('tipologia',['interna','esterna']);
            $table->string('descrizione',2500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centroAssistenza');
    }
}
