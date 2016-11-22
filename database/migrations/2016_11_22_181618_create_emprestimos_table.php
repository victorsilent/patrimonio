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
            $table->integer('patrimonio_id')->unsigned()->index();
            $table->integer('local_id')->unsigned()->index();
            $table->date('data_prevista');
            $table->date('data_devolucao');
            $table->date('data_emprestimo');
            $table->string('solicitante');
            $table->string('email_solicitante');

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
