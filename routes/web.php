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
//Panel index que te envia a la vista segun corresponda
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/PanelTutorias','tutoresController@index')->name('tutor.index');
Route::put('/actualizarContactoBdt/{id}','tutoresController@actualizarContacto')->name('contactos.update');


//registra cuando una tutoria no es efectiva.
Route::get('/SinContacto/{id_biblioteca}','tutoresController@TutoriaNoefectiva')->name('llamada.buzon');
Route::post('/Sincontacto','tutoresController@GuardarNoEfectiva')->name('guardar.buzon');


Route::get('/Panel/tutoria{clavebdt}','tutoresController@ContactoEfectivo')->name('inicio.tutoria');
