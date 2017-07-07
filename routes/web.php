<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['web']], function(){
    Route::resource('alunos', 'AlunoController');

    Route::resource('turmas', 'TurmaController');

    Route::resource('professors', 'ProfessorController');

});