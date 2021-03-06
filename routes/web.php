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

    /**
     * Cobrança Dashboard
     */
    Route::get('/financeiro', 'FinanceiroController@index')->name('index');
    /**
     * Cobrança Dashboard
     */
    Route::any('/financeiro/mensalidade/search', 'MensalidadeController@search')->name('search');

    Route::get('/financeiro/mensalidade', 'MensalidadeController@index')->name('index');
    Route::get('/financeiro/mensalidade/novo', 'MensalidadeController@novo')->name('novo');
    Route::post('/financeiro/mensalidade/create', 'MensalidadeController@store');
    Route::get('/financeiro/mensalidade/editar/{id}',['as'=>'financeiro.mensalidade.editar', 'uses'=>'MensalidadeController@editar']);
    Route::post('/financeiro/mensalidade/atualizar/{id}',['as'=>'financeiro.mensalidade.atualizar', 'uses'=>'MensalidadeController@atualizar']);
    Route::get('/financeiro/mensalidade/deletar/{id}',['as'=>'financeiro.mensalidade.deletar', 'uses'=>'MensalidadeController@deletar']);
    Route::get('/financeiro/mensalidade/boleto_action', 'MensalidadeController@action_boleto')->name('boleto_action');
    
    /**
     * Produtos Dashboard
     */
    Route::get('/cadastro/produtos', 'ProdutoController@index')->name('index');
    Route::post('/cadastro/produtos/create', 'ProdutoController@store');
    Route::get('/cadastro/produtos/editar/{id}',['as'=>'cadastro.produtos.editar', 'uses'=>'ProdutoController@editar']);
    Route::post('/cadastro/produtos/atualizar/{id}',['as'=>'cadastro.produtos.atualizar', 'uses'=>'ProdutoController@atualizar']);
    Route::get('/cadastro/produtos/deletar/{id}',['as'=>'cadastro.produtos.deletar', 'uses'=>'ProdutoController@deletar']);

});


Auth::routes();



Route::get('/', function () {
    return view('site.index');
});
