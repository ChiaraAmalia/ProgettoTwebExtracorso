<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Malfunzionamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malfunzionamento', function (Blueprint $table){
            $table->bigIncrements('codice_malfunzionamento')->unsigned()->index();
            $table->bigInteger('codice_prodotto')->unsigned()->index()->nullable();
            $table->foreign('codice_prodotto')->references('codice_prodotto')->onDelete('CASCADE')->on('prodotto');
            $table->string('titolo',500);
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
