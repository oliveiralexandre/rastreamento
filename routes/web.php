<?php

Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function() {

    /**
     * Home Dashboard
     */
    Route::get('/', 'DashboardController@index')->name('admin.index');

    /**
     * Clientes Dashboard
     */
    Route::get('/cadastro/clientes', 'ClienteController@index')->name('index');
    Route::post('/cadastro/clientes/create', 'ClienteController@store');
    Route::get('/cadastro/clientes/editar/{id}',['as'=>'cadastro.clientes.editar', 'uses'=>'ClienteController@editar']);
    Route::post('/cadastro/clientes/atualizar/{id}',['as'=>'cadastro.clientes.atualizar', 'uses'=>'ClienteController@atualizar']);
    Route::get('/cadastro/clientes/deletar/{id}',['as'=>'cadastro.clientes.deletar', 'uses'=>'ClienteController@deletar']);

    /**
     * Veículos Dashboard
     */
    Route::get('/cadastro/veiculos', 'VeiculoController@index')->name('index');
    Route::post('/cadastro/veiculos/create', 'VeiculoController@store');
    Route::get('/cadastro/veiculos/editar/{id}',['as'=>'cadastro.veiculos.editar', 'uses'=>'VeiculoController@editar']);
    Route::post('/cadastro/veiculos/atualizar/{id}',['as'=>'cadastro.veiculos.atualizar', 'uses'=>'VeiculoController@atualizar']);
    Route::get('/cadastro/veiculos/deletar/{id}',['as'=>'cadastro.veiculos.deletar', 'uses'=>'VeiculoController@deletar']);

});


Auth::routes();



Route::get('/', function () {
    return view('welcome');
});
