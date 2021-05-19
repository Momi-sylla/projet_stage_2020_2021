<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accesstable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_enseignants', function (Blueprint $table){
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_ens')->unsigned();
            $table->primary(array('id_user','id_ens'));
            $table->foreign('id_user')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_ens')->references('id')->on('enseignants')
            ->onUpdate('cascade')->onDelete('cascade');

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
