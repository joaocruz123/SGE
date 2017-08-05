<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['web']], function(){
    Route::resource('alunos', 'AlunoController');

    Route::resource('turmas', 'TurmaController');

    Route::resource('professors', 'ProfessorController');

    Route::resource('matriculas', 'MatriculaController');

    Route::resource('categorias_despesas', 'CategoriasDespesaController');

    Route::resource('categorias_rendas', 'CategoriasRendaController');

    Route::resource('despesas', 'DespesasController');

    Route::resource('rendas', 'RendasController');

    Route::resource('relatorio_mensal', 'RelatorioMensalController');

    Route::get('/imprimir/lista', 'AlunoController@gerarPdf');


});