<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_despesa_id')->unsigned()->nullable();
            $table->foreign('categoria_despesa_id', '50059_5959a5b7c2fa6')->references('id')->on('categorias_despesas')->onDelete('cascade');
            $table->date('data')->nullable();
            $table->string('valor');

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
        Schema::dropIfExists('despesas');
    }
}
