<?php

Route::get('/', 'AtracoesController@criarMenu');
Route::get('/atracoes', 'AtracoesController@criarMenuAtracoes');

Route::get('/admin/painel', 'AtracoesController@listarElementosPainel')->middleware('auth');
Route::post('/admin/verificar', 'AtracoesController@verificarBotao');

Route::get('/admin/novo', 'AtracoesController@novo')->middleware('auth');
Route::post('/admin/cadastrar', 'AtracoesController@cadastrar')->middleware('auth');
Route::get('/admin/excluir/{id}', 'AtracoesController@excluir')->middleware('auth');

Route::get('/login', function() {
	return view('auth/login');
});

Auth::routes();
