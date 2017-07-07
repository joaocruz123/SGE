<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alunos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('cpf')->unique();
            $table->string('sexo');
            $table->string('endereco');
            $table->integer('idade');
            $table->integer('telefone');
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
		Schema::drop('alunos');
	}

}
