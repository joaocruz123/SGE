<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        Schema::create('matriculas',function(Blueprint $table){
            $table->increments("id");
            $table->integer("aluno_id")->references("id")->on("alunos");
            $table->integer("turma_id")->references("id")->on("turmas");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('matriculas');
    }

}
