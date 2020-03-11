<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/listar_usuarios', 'UserController@listar_usuarios');
    Route::post('criar_usuario', 'UserController@criar_usuario');
    Route::post('editar_usuario', 'UserController@editar_usuario');
    Route::post('buscar_usuario', 'UserController@buscar_usuario');
    Route::post('apagar_usuario', 'UserController@apagar_usuario');
    Route::post('editar_acesso', 'UserController@editar_acesso');

    Route::post('criar_rol', 'UserController@criar_rol');
    Route::post('criar_permiso', 'UserController@criar_permiso');
    Route::post('agregar_permiso', 'UserController@agregar_permiso');
    Route::get('apagar_permiso/{idrol}/{idper}', 'UserController@apagar_permiso');

    Route::get('form_novo_usuario', 'UserController@form_novo_usuario');
    Route::get('form_novo_rol', 'UserController@form_novo_rol');
    Route::get('form_novo_permiso', 'UserController@form_novo_permiso');
    Route::get('form_editar_usuario/{id}', 'UserController@form_editar_usuario');
    Route::get('confirmacao_apagar_usuario/{idusuario}', 'UserController@confirmacao_apagar_usuario');
    Route::get('agregar_rol/{idusu}', 'UserController@agregar_rol');
    Route::get('apagar_rol/{idusu}', 'UserController@apagar_rol');
    Route::get('form_excluir_usuario/{idusu}', 'UserController@form_excluir_usuario');
    Route::get('excluir_rol/{idrol}', 'UserController@excluir_rol');

});

Route::group(['middleware' => ['web']], function(){
    Route::resource('studants','StudantController');

    Route::resource('turmas', 'TurmaController');

    Route::resource('/turma_disciplina', 'TurmaController@disciplinas');
    
    Route::post('/turma_disciplina_store', 'TurmaController@turma_disciplinas_store');
    
    Route::resource('disciplinas', 'DisciplinaController');

    Route::resource('professors', 'ProfessorController');

    Route::resource('matriculas', 'MatriculaController');

    Route::resource('categorias_despesas', 'CategoriasDespesaController');

    Route::resource('categorias_rendas', 'CategoriasRendaController');

    Route::resource('despesas', 'DespesasController');

    Route::resource('rendas', 'RendasController');

    Route::resource('relatorio_mensal', 'RelatorioMensalController');

    Route::get('/imprimir/relatorio', 'RelatorioMensalController@gerarPdf');

    Route::get('/imprimir/lista', 'StudantController@gerarPdf');

    Route::get('/imprimir/aluno', 'StudantController@gerarPdf');

    Route::resource('aluno_relatorio', 'StudantController@relatorioAluno');

    Route::resource('chamadas', 'ChamadaController');

    Route::put('/fazer_chamada/chamada/{id}', 'ChamadaController@fazer_chamada');

    Route::resource('/chamadas/frequencia/{id}', 'ChamadaController@frequencia');

});