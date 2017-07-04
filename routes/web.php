<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['web']], function(){
    Route::resource('alunos', 'AlunoController');
});

Route::group(['middleware' => ['web']], function(){
    Route::resource('turmas', 'TurmaController');
});

Route::group(['middleware' => ['web']], function(){
    Route::resource('professors', 'ProfessorController');
});

Route::group(['middleware' => ['web']], function(){
    Route::resource('matriculas', 'MatriculaController');
});

