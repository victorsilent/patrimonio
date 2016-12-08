<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_movimentacao');

            $table->unsignedInteger('patrimonio_id');
            $table->unsignedInteger('origem_id');
            $table->unsignedInteger('destino_id');

            $table->foreign('patrimonio_id')->references('id')->on('patrimonios');
            $table->foreign('origem_id')->references('id')->on('locais');
            $table->foreign('destino_id')->references('id')->on('locais');
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
        Schema::dropIfExists('historicos');
    }
}
