<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCordenadorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cordenadors', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->integer('idade');
            $table->string('sexo');
            $table->string('endereco');
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
		Schema::drop('cordenadors');
	}

}
