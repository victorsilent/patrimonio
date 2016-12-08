<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_prevista');
            $table->date('data_devolucao');
            $table->date('data_emprestimo');
            $table->string('solicitante');
            $table->string('email_solicitante');
            
            $table->unsignedInteger('patrimonio_id');
            $table->unsignedInteger('local_id');

            $table->foreign('patrimonio_id')->references('id')->on('patrimonios');
            $table->foreign('local_id')->references('id')->on('locais');

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
        Schema::dropIfExists('emprestimos');
    }
}
