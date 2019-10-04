<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('embalagem_id');
            $table->foreign('embalagem_id')->references('id')->on('embalagens');
            $table->unsignedBigInteger('remetente_id');
            $table->foreign('remetente_id')->references('id')->on('remetentes');
            $table->unsignedBigInteger('origem_id');
            $table->foreign('origem_id')->references('id')->on('origens');
            $table->unsignedBigInteger('destino_id');
            $table->foreign('destino_id')->references('id')->on('destinos');
            $table->unsignedBigInteger('modal_id');
            $table->foreign('modal_id')->references('id')->on('modais');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');
            $table->string('volume');
            $table->string('descricao');
            $table->string('peso');
            $table->date('data_saida');
            $table->integer('guia_embarque');
            $table->date('ultima_alteracao');
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
        Schema::dropIfExists('materiais');
    }
}
