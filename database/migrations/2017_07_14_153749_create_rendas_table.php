<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**Schema::create('rendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_renda_id')->unsigned()->nullable();
            $table->foreign('categoria_renda_id', '50058_5959a5b67d400')->references('id')->on('categorias_rendas')->onDelete('cascade');
            $table->date('data')->nullable();
            $table->string('valor');

            $table->timestamps();

        });*/
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
