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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index');

    //Rotas de busca :B
    Route::post('search','PatrimonioController@search');
    Route::get('search','PatrimonioController@search');

    //Rotas atreladas ao patrimonio
    Route::resource('patrimonios','PatrimonioController');
    Route::resource('patrimonios.emprestimos', 'EmprestimoController');
    
    //Rotas gerais da aplicação
    Route::resource('projetos', 'ProjetosController');
    Route::resource('tipos', 'TiposController');
    Route::resource('locais', 'LocaisController');
});



