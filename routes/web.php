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
Route::get('/page', 'HomeController@pagina')->name('page');
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
Route::get('/legajos/ver/{id}/', 'LegajosController@view')->name('view_leg');

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
/*PAGE*/
Route::get('/seguimiento/expedientes', 'ExpedientesController@seguimiento')->name('exp_tracing');
Route::post('/expedientes/search', 'ExpedientesController@buscar')->name('exp_buscar');


/*PERSONAS*/
Route::get('/personas', 'PersonasController@index')->name('preson_index');
Route::post('/personas/find', 'PersonasController@find')->name('person_find');
Route::get('/personas/view/{id}', 'PersonasController@view')->name('person_view');
Route::post('/persosnas/editarPersona', 'PersonasController@editarPersona')->name('person_editarP');
Route::get('/personas/editarPersona/{id}', 'PersonasController@editar')->name('person_editar');
Route::post('/personas/create', 'PersonasController@create')->name('preson_create');
Route::post('/personas/buscar', 'PersonasController@search')->name('person_search');
Route::get('/personas/editar/{id}', 'PersonasController@edit')->name('person_edit');
Route::post('/persosnas/update', 'PersonasController@update')->name('person_update');
Route::post('/personas/cargo/eliminar', 'PersonasController@destroy')->name('person_delete');


/*CONSULTAS*/
Route::get('/consultas/{tipo}/{juri?}/{zona?}/{mandato?}', 'ConsultasController@index')->name('consultas.index');
//Route::post('/consultas/{tipo}', 'ConsultasController@index')->name('consultas.index');

/*REPORTES*/
Route::get('/reportes/{tipo}/{juri?}/{zona?}/{mandato?}', 'PdfController@reporte')->name('prueba');
Route::get('/turno/download/{id}/{fecha}', 'PdfController@turno')->name('turno');

/*OFICINAS*/
Route::get('/oficinas', 'OficinasController@index')->name('oficina.index');
Route::post('/oficinas/create', 'OficinasController@create')->name('oficina.create');
Route::post('/oficina/eliminar', 'OficinasController@destroy')->name('oficina.delete');
Route::post('/oficina/editar', 'OficinasController@update')->name('oficina.update');

/*TRAMITES*/
Route::get('/tramites', 'TramitesController@index')->name('tramite.index');
Route::post('/tramite/create', 'TramitesController@create')->name('tramite.create');
Route::post('/tramite/eliminar', 'TramitesController@destroy')->name('tramite.delete');
Route::post('/tramite/editar', 'TramitesController@update')->name('tramite.update');

/*CONFIG_OFICINAS*/
Route::get('/oficina/{id}', 'ConfigController@index')->name('config.index');
Route::post('/config/create', 'ConfigController@create')->name('config.create');
Route::post('/config/eliminar', 'ConfigController@destroy')->name('config.delete');
Route::post('/config/editar', 'ConfigController@update')->name('config.update');
Route::post('/config/buscar', 'ConfigController@search')->name('config.search');

/*TURNOS*/
Route::get('/RegistroCivil', 'TurnosController@registroCivil')->name('registroCivil');
Route::get('/turno', 'TurnosController@index')->name('turno.index');
Route::post('/turno/create', 'TurnosController@create')->name('turno.create');
Route::post('/turno/created', 'TurnosController@created')->name('turno.created');
Route::get('/turno/buscar', 'TurnosController@buscar')->name('turno.search');
Route::post('/turno/search', 'TurnosController@search')->name('turno.buscar');
Route::post('/turno/searchTurno', 'TurnosController@searchTurno')->name('turno.searchTurno');
Route::get('/turno/todos/{fecha?}', 'TurnosController@view')->name('turno.view');
Route::post('/turno/estado', 'TurnosController@status')->name('turno.status');