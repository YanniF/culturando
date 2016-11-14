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
Route::get('/admin/destaques/editar/{id}', 'DestaquesController@editar');
Route::post('/admin/destaques/atualizar/{id}', 'DestaquesController@alterar');
Route::get('/admin/destaques/exibir/{id}', 'DestaquesController@exibir');
Route::get('/admin/destaques/excluir/{id}', 'DestaquesController@excluir');

Route::get('/admin/parceiros/painel', 'ParceirosController@listarElementos');
Route::get('/admin/parceiros/novo', 'ParceirosController@novo');
Route::post('/admin/parceiros/cadastrar', 'ParceirosController@cadastrar');
Route::get('/admin/parceiros/editar/{id}', 'ParceirosController@editar');
Route::post('/admin/parceiros/atualizar/{id}', 'ParceirosController@alterar');
Route::get('/admin/parceiros/exibir/{id}', 'ParceirosController@exibir');
Route::get('/admin/parceiros/excluir/{id}', 'ParceirosController@excluir');

Route::get('/admin/eventos/painel', 'EventosController@listarElementos');
Route::post('/admin/eventos/verificar', 'EventosController@verificarBotao');
Route::get('/admin/eventos/novo', 'EventosController@novo');
Route::post('/admin/eventos/cadastrar', 'EventosController@cadastrar');
Route::get('/admin/eventos/editar/{id}', 'EventosController@editar');
Route::post('/admin/eventos/atualizar/{id}', 'EventosController@alterar');
Route::get('/admin/eventos/exibir/{id}', 'EventosController@exibir');
Route::get('/admin/eventos/excluir/{id}', 'EventosController@excluir');

Auth::routes();
