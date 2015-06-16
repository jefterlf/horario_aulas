<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::resource('welcome_r', 'WelcomeController@index');
Route::resource('turmas_r','TurmasController');
Route::resource('materias_r','MateriasController');
Route::resource('professors_r','ProfessorController');
Route::resource('horarios_r','HorariosController');
Route::resource('bimestres_r','BimestreController');
Route::resource('usuarios_r','UsuariosController');
Route::get('turmas_teste_r','TurmasController@teste');

