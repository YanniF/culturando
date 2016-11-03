<?php

Route::get('/', 'HomeController@criarMenu');
Route::get('/atracoes', 'AtracoesController@criarMenuAtracoes');

Route::get('/admin/', 'PainelController@chamarPainel');
Route::get('/admin/painel', 'PainelController@chamarPainel');

Route::get('/admin/atracoes/painel', 'AtracoesController@listarElementosPainel');
Route::post('/admin/atracoes/verificar', 'AtracoesController@verificarBotao');
Route::get('/admin/atracoes/novo', 'AtracoesController@novo');
Route::post('/admin/atracoes/cadastrar', 'AtracoesController@cadastrar');
Route::get('/admin/atracoes/editar/{id}', 'AtracoesController@editar');
Route::post('/admin/atracoes/atualizar/{id}', 'AtracoesController@alterar');
Route::get('/admin/atracoes/exibir/{id}', 'AtracoesController@exibir');
Route::get('/admin/atracoes/excluir/{id}', 'AtracoesController@excluir');

Route::get('/admin/destaques/painel', 'DestaquesController@listarElementos');
Route::get('/admin/destaques/novo', 'DestaquesController@novo');
Route::post('/admin/destaques/cadastrar', 'DestaquesController@cadastrar');

Auth::routes();
