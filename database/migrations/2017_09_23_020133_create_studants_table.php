<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatestudantsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studants', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('cpf')->unique();
            $table->string('sexo');
            $table->string('endereco');
            $table->integer('idade');
            $table->integer('telefone');
            $table->char('matricula');
            $table->integer('turma_id')->unsigned();
            $table->timestamps();

            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('studants');
    }
}
