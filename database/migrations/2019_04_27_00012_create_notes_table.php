<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('note');
            // id matiere
            // id eleve
            $table->unsignedBigInteger('matiere_id')->default(0);
            //$table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');

            $table->unsignedBigInteger('etudiant_id')->default(0);
            //$table->foreign('eleve_id')->references('id')->on('eleves')->onDelete('cascade');

            $table->integer('semestre');
            $table->integer('numeroExamen');
            $table->unsignedBigInteger('anneeScolaire_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}