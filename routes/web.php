<?php

Route::get('/', 'AtracoesController@criarMenu');
Route::get('/atracoes', 'AtracoesController@criarMenuAtracoes');

Route::get('/painel', 'AtracoesController@criarComboPainel')->middleware('auth');
Route::post('/verificar', 'AtracoesController@verificarBotao');
Route::get('/novo', 'AtracoesController@novo')->middleware('auth');
Route::post('/cadastrar', 'AtracoesController@cadastrar')->middleware('auth');

Route::get('/login', function() {
	return view('auth/login');
});

Auth::routes();
