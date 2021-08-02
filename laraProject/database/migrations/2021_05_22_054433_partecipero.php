<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Partecipero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partecipero', function (Blueprint $table){
            $table->bigIncrements('id')->unsigned()->index();
            $table->bigInteger('codice_utente')->nullable();
            $table->bigInteger('codice_evento')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partecipero');
    }
}
