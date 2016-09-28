<?php

Route::get('/', 'AtracoesController@criarMenu');
Route::get('/atracoes', 'AtracoesController@criarMenuAtracoes');

Route::get('/painel', 'AtracoesController@listarElementosPainel')->middleware('auth');
Route::get('/verificar', 'AtracoesController@verificarBotao');

Route::get('/novo', 'AtracoesController@novo')->middleware('auth');
Route::post('/cadastrar', 'AtracoesController@cadastrar')->middleware('auth');
Route::get('/excluir/{id}', 'AtracoesController@excluir')->middleware('auth');

Route::get('/login', function() {
	return view('auth/login');
});

Auth::routes();
