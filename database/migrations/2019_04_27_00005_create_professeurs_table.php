<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professeurs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('emplois_id')->default(0);

            $table->unsignedBigInteger('matiere_id')->default(0);

            $table->unsignedBigInteger('utilisateur_id')->default(0);

            // Matiere
            //$table->unsignedBigInteger('id_mat');
            //$table->foreign('id_mat')->references('id')->on('matieres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professeurs');
    }
}