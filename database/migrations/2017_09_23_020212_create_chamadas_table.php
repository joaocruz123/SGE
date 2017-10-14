<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamadasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('chamadas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('datachamada');
            $table->integer('turma_id')->unsigned();
            $table->integer('realizada');
            $table->timestamps();

            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::drop('chamadas');
    }

}
