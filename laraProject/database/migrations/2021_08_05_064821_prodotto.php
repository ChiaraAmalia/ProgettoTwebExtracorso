<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prodotto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodotto', function (Blueprint $table){
            $table->bigIncrements('codice_prodotto')->unsigned()->index();
            $table->string('nome_prodotto')->nullable();
            $table->enum('tipologia',['lavatrice','lavastoviglie','forno','frigorifero','asciugatrice']);
            $table->string('rumore')->nullable();
            $table->string('consumo_en_annuo')->nullable();
            $table->string('luce_interna')->nullable();
            $table->string('programmi',2500)->nullable();
            $table->enum('classe_energetica',['A+++','A++','A+','A','B','C','D','E','F','G'])->nullable();
            $table->string('descrizione',2500)->nullable();
            $table->text('immagine')->nullable();
            $table->string('tecniche_buonuso',2500)->nullable();
            $table->string('modalita_installazione',2500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodotto');
    }
}
