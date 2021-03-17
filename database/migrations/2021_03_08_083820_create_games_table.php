<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('rows')->unsigned();// nombre de lignes dans la grille du jeu
            $table->integer('cols')->unsigned(); // nombre de colonnes dans la grille du jeu
            $table->integer('eggs')->unsigned(); // nombre d'oeufs dans la grille du jeu
            $table->integer('snakes')->unsigned(); // nombre de serpents/joueurs dans la grille du jeu
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
        Schema::dropIfExists('games');
    }
}
