<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::any('remetentes/search','RemetenteController@search')->name('remetentes.search');
    Route::resource('remetentes','RemetenteController');
    
    Route::any('status/search','StatusController@search')->name('status.search');
    Route::resource('status','StatusController');
    
    Route::any('modais/search','ModalController@search')->name('modais.search');
    Route::resource('modais','StatusController');
    
    Route::any('embalagens/search','EmbalagemController@search')->name('embalagens.search');
    Route::resource('embalagens','EmbalagemController');
    
    Route::any('origens/search','OrigemController@search')->name('origens.search');
    Route::resource('origens','OrigemController');
    
    Route::any('materiais/search','MaterialController@search')->name('materiais.search');
    Route::resource('materiais','MaterialController');
    
    Route::any('destinos/search','DestinoController@search')->name('destinos.search');
    Route::resource('destinos','DestinoController');
    
    Route::any('numeracoes/search','NumeracaoController@search')->name('numeracoes.search');
    Route::get('ativar_ano/{id}','NumeracaoController@ativarAno')->name('ativar_ano');
    Route::resource('numeracoes','NumeracaoController');
});


Route::get('/', function () {
    return view('welcome');
});
