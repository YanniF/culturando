<?php

Route::get('/', 'AtracoesController@criarMenu');
Route::get('/atracoes', 'AtracoesController@criarMenuAtracoes');

Route::get('/admin', function() {
	return view('auth/login');
});

Route::get('/painel', 'AtracoesController@criarComboPainel')->middleware('auth');
Route::get('/cadastrar', 'AtracoesController@novo')->middleware('auth');

Auth::routes();
