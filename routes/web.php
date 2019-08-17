<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return view('layouts.app');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('animal/cadastro','AnimalController@index');
Route::get('atendimento/cadastro','AtendimentoController@index');
Route::get('especie/cadastro','EspecieController@index');


Route::post('animal/salvar','AnimalController@salvar');
Route::get('animal/visualizar','AnimalController@listar');
Route::get('animal/excluir','AnimalController@excluir');
Route::get('animal','AnimalController@index');
Route::get("animal/download", "AnimalController@download");


Route::post('especie/salvar','EspecieController@salvar');
Route::get('especie/visualizar','EspecieController@listar');
Route::get('especie/excluir','EspecieController@excluir');
Route::get('especie','EspecieController@index');


Route::post('atendimento/salvar','AtendimentoController@salvar');
Route::get('atendimento/visualizar','AtendimentoController@listar');
Route::get('atendimento/excluir','AtendimentoController@excluir');
Route::get('atendimento','AtendimentoController@index');

