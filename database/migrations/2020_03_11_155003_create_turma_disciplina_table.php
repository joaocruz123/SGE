<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma_disciplinas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turma_id')->unsigned()->index();
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
            $table->integer('disciplina_id')->unsigned()->index();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
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
        Schema::drop('turma_disciplina');
    }
}
