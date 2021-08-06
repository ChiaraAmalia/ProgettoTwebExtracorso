<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Utente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table){
            $table->bigIncrements('id')->unsigned()->index();
            $table->enum('categoria',['tecnico','staff','amministratore']);
            $table->enum('specializzazione',['lavatrice','lavastoviglie','forno','frigorifero','congelatore','asciugatrice'])->nullable();
            $table->enum('occupazione',['interna','esterna']);
            $table->string('nome_centro',200)->nullable();
            $table->string('email',40)->unique();
            $table->string('username',20);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nome',30)->nullable();
            $table->string('cognome',30)->nullable();
            $table->string('via',30)->nullable();
            $table->string('citta',40)->nullable();
            $table->Integer('cap')->nullable();
            $table->string('sesso')->nullable();
            $table->Integer('cellulare',10)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}