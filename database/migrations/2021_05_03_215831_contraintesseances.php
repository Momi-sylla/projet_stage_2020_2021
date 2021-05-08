<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contraintesseances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contraintesseances', function (Blueprint $table){
            $table->id();
            $table->bigInteger('id_seance')->unsigned();
            $table->bigInteger('type')->unsigned();
            $table->foreign('id_seance')->references('id')->on('seances');
            $table->string('arguments');
            $table->foreign('type')->references('id')->on('typecontraintes');

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
