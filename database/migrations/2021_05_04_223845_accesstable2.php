<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accesstable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salles_seances', function (Blueprint $table){
            $table->bigInteger('id_seance')->unsigned();
            $table->bigInteger('id_salle')->unsigned();
            $table->primary(array('id_seance','id_salle'));
            $table->foreign('id_seance')->references('id')->on('seances')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_salle')->references('id')->on('salles')->onUpdate('cascade')->onDelete('cascade');

           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
