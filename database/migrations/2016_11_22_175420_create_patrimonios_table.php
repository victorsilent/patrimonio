<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimoniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patrimonio');
            $table->string('plq_ufc');
            $table->string('plq_dc');
            $table->string('plq_fcpc');
            $table->string('plq_great');
            $table->string('status_emprestimo');
            $table->string('status_uso');
            $table->text('descricao');

            $table->unsignedInteger('tipo_id');
            $table->unsignedInteger('local_id');
            $table->unsignedInteger('projeto_id');
            
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('local_id')->references('id')->on('locais');
            $table->foreign('projeto_id')->references('id')->on('projetos');  
            
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
        Schema::dropIfExists('patrimonios');
    }
}
