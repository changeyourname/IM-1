<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/', function()
{	
    return View::make('adm.login.index');
});

//Conf
Route::resource('/sistema','ConfSistemaController');    
Route::resource('/modulo','ConfModuloController');    


//Admin
Route::post('/logar',array('uses'=>'AdmUsuarioController@Login'));
Route::resource('/usuario','AdmUsuarioController');    
Route::resource('/unidadeAdm','AdmUnidadeController');
Route::resource('/cargo','AdmCargoController');
Route::resource('/secretaria','AdmSecretariaController');

//Geral
Route::post('cep',array('uses'=>'EnderecoController@BuscaCep'));
Route::post('geo',array('uses'=>'EnderecoController@GeoLocalizacao'));


//PRJ
Route::resource('projeto','PrjProjetoController');


App::missing(function($exception)
{
    return Response::view('erro.404', array(), 404);
});




