<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->integer('annee');
            $table->integer('niveau');
            $table->integer('active');

            // id Emplois
            // id filiere
            $table->unsignedBigInteger('emplois_id')->default(0);
            //$table->foreign('id_emp')->references('id')->on('emplois')->onDelete('cascade');

            $table->unsignedBigInteger('filiere_id')->default(0); 
            //$table->foreign('id_filiere')->references('id')->on('filieres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupes');
    }
}