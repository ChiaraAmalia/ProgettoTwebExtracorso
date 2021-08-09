<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Intervento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervento', function (Blueprint $table){
            $table->bigIncrements('codice_intervento')->unsigned()->index();
            $table->bigInteger('codice_malfunzionamento')->unsigned()->index()->nullable();
            $table->foreign('codice_malfunzionamento')->references('codice_malfunzionamento')->onDelete('CASCADE')->on('malfunzionamento');
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
        Schema::dropIfExists('malfunzionamento');
    }
}
