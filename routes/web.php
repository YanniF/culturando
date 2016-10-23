<?php

Route::get('/', 'AtracoesController@criarMenu');
Route::get('/atracoes', 'AtracoesController@criarMenuAtracoes');

Route::get('/admin/', 'PainelController@chamarPainel');
Route::get('/admin/painel', 'PainelController@chamarPainel');

Route::get('/admin/atracoes/painel', 'AtracoesController@listarElementosPainel')->middleware('auth');
Route::post('/admin/verificar', 'AtracoesController@verificarBotao');

Route::get('/admin/novo', 'AtracoesController@novo')->middleware('auth');
Route::post('/admin/cadastrar', 'AtracoesController@cadastrar')->middleware('auth');
Route::get('/admin/exibir/{id}', 'AtracoesController@exibir')->middleware('auth');
Route::get('/admin/excluir/{id}', 'AtracoesController@excluir')->middleware('auth');

Auth::routes();
