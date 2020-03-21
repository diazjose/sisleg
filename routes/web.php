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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*USUARIOS*/
Route::get('/usuarios', 'UsuariosController@index')->name('users.index');
Route::get('/usuarios/nuevo', 'UsuariosController@new')->name('users.new');
Route::post('/usuarios/create', 'UsuariosController@create')->name('users.create');
Route::post('/usuarios/update', 'UsuariosController@update')->name('users.edit');
Route::post('/usuarios/eliminar', 'UsuariosController@destroy')->name('users.delete');
Route::post('/usuarios/buscar', 'UsuariosController@search')->name('users.leg');

/*LEGAJOS*/
Route::get('/legajos', 'LegajosController@index')->name('legajos_index');
Route::get('/legajos/nuevo', 'LegajosController@new')->name('new_legajo');
Route::post('/legajos/create', 'LegajosController@create')->name('create_leg');
Route::post('/legajos/update', 'LegajosController@update')->name('update_leg');
Route::post('/legajos/buscar', 'LegajosController@search')->name('search_leg');
Route::get('/legajos/ver/{id}', 'LegajosController@view')->name('view_leg');

/*EXPEDIENTES*/
Route::get('/expedientes', 'ExpedientesController@index')->name('exp_index');
Route::get('/expedientes/nuevo/{id?}', 'ExpedientesController@new')->name('exp_new');
Route::post('/expedientes/create', 'ExpedientesController@create')->name('exp_create');
Route::post('/expedientes/buscar', 'ExpedientesController@search')->name('exp_search');
Route::post('/expedientes/buscar_area', 'ExpedientesController@search_area')->name('exp_search_area');
Route::get('/expedientes/ver/{id}', 'ExpedientesController@view')->name('exp_view');
Route::get('/expedientes/editar/{id}', 'ExpedientesController@edit')->name('exp_edit');
Route::post('/expedientes/update', 'ExpedientesController@update')->name('exp_update');
Route::post('/expedientes/seguir', 'ExpedientesController@tracing')->name('seg_create');
Route::get('/expedientes/{area}', 'ExpedientesController@area')->name('exp_area');
Route::get('/expediente/{id}', 'ExpedientesController@exp_area')->name('exp_area_view');
Route::post('/expediente/estado', 'ExpedientesController@exp_status')->name('exp_status');

/*PERSONAS*/
Route::post('/personas/create', 'PersonasController@create')->name('preson_create');
Route::post('/personas/buscar', 'PersonasController@search')->name('person_search');



