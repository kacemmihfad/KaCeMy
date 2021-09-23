<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemarquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('remarque');
            // id matiere
            // id eleve
            // id prof
            $table->unsignedBigInteger('note_id')->default(0);
            /*$table->unsignedBigInteger('matiere_id')->default(0);
            //$table->foreign('id_mat')->references('id')->on('matieres')->onDelete('cascade');

            $table->unsignedBigInteger('eleve_id')->default(0);
            //$table->foreign('id_eleve')->references('id')->on('eleves')->onDelete('cascade');

            $table->unsignedBigInteger('professeur_id')->default(0);
            //$table->foreign('id_prof')->references('id')->on('professeurs')->onDelete('cascade');

            $table->integer('semestre');

            $table->unsignedBigInteger('anneeScolaire_id')->default(0);*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remarques');
    }
}