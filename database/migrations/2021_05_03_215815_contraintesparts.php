<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contraintesparts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contraintesparts', function (Blueprint $table){
            $table->id();
            $table->bigInteger('id_part')->unsigned();
            $table->bigInteger('type')->unsigned();
            $table->string('arguments');
            $table->foreign('id_part')->references('id')->on('parts');
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
