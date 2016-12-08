<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnsPatrimonio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patrimonios', function (Blueprint $table) {

            $table->string('plq_ufc')->unique()->change();
            $table->string('plq_dc')->unique()->change();
            $table->string('plq_fcpc')->unique()->change();
            $table->string('plq_great')->unique()->change();
            
            $table->boolean('status_emprestimo')->change();
            $table->boolean('status_uso')->change();

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
