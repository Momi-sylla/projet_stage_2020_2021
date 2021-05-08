<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table){
            $table->id();
            $table->string('nom');
            $table->bigInteger('type_part')->unsigned();
            $table->bigInteger('id_mat')->unsigned();
            $table->integer('nb_ens');
            $table->integer('nb_salle');
            $table->foreign('id_mat')->references('id')->on('matieres');
            $table->foreign('type_part')->references('id')->on('typeparts');

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
