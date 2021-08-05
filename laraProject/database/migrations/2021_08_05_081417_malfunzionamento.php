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
            $table->foreign('codice_prodotto')->references('codice_prodotto')->onDelete('SET NULL')->on('prodotto');
            $table->string('titolo');
            $table->string('descrizione');
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
