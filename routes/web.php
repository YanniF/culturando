<?php

Route::get('/', 'AtracoesController@criarMenu');
Route::get('/atracoes', 'AtracoesController@criarMenuAtracoes');

Route::get('/admin/', 'PainelController@chamarPainel');
Route::get('/admin/painel', 'PainelController@chamarPainel');

Route::get('/admin/atracoes/painel', 'AtracoesController@listarElementosPainel')->middleware('auth');
Route::post('/admin/verificar', 'AtracoesController@verificarBotao');
Route::get('/admin/atracoes/novo', 'AtracoesController@novo')->middleware('auth');
Route::post('/admin/atracoes/cadastrar', 'AtracoesController@cadastrar')->middleware('auth');
Route::get('/admin/atracoes/editar/{id}', 'AtracoesController@editar')->middleware('auth');
Route::post('/admin/atracoes/atualizar/{id}', 'AtracoesController@alterar')->middleware('auth');
Route::get('/admin/atracoes/exibir/{id}', 'AtracoesController@exibir')->middleware('auth');
Route::get('/admin/atracoes/excluir/{id}', 'AtracoesController@excluir')->middleware('auth');

Auth::routes();
