<?php

Route::get('/', 'HomeController@index');
Route::get('/atracoes/{tipo}/{cidade}/{id?}', 'HomeController@exibirAtracoes');
Route::get('/destaques/{id?}', 'HomeController@exibirDestaques');
Route::get('/eventos/{eventoEm}/{id?}', 'HomeController@exibirEventos');
Route::get('/parceiros', 'HomeController@exibirParceiros');
Route::get('/baixada', 'HomeController@baixadaTem');
Route::get('/vale', 'HomeController@valeTem');

/*Admin*/
Route::get('/admin/', 'PainelController@chamarPainel');
Route::get('/admin/painel', 'PainelController@chamarPainel');
/*Atrações*/
Route::get('/admin/atracoes/painel', 'AtracoesController@listarElementosPainel');
Route::post('/admin/atracoes/verificar', 'AtracoesController@verificarBotao');
Route::get('/admin/atracoes/novo', 'AtracoesController@novo');
Route::post('/admin/atracoes/cadastrar', 'AtracoesController@cadastrar');
Route::get('/admin/atracoes/editar/{id}', 'AtracoesController@editar');
Route::post('/admin/atracoes/atualizar/{id}', 'AtracoesController@alterar');
Route::get('/admin/atracoes/exibir/{id}', 'AtracoesController@exibir');
Route::get('/admin/atracoes/excluir/{id}', 'AtracoesController@excluir');
/*Destaques*/
Route::get('/admin/destaques/painel', 'DestaquesController@listarElementos');
Route::get('/admin/destaques/novo', 'DestaquesController@novo');
Route::post('/admin/destaques/cadastrar', 'DestaquesController@cadastrar');
Route::get('/admin/destaques/editar/{id}', 'DestaquesController@editar');
Route::post('/admin/destaques/atualizar/{id}', 'DestaquesController@alterar');
Route::get('/admin/destaques/exibir/{id}', 'DestaquesController@exibir');
Route::get('/admin/destaques/excluir/{id}', 'DestaquesController@excluir');
/*Parceiros*/
Route::get('/admin/parceiros/painel', 'ParceirosController@listarElementos');
Route::get('/admin/parceiros/novo', 'ParceirosController@novo');
Route::post('/admin/parceiros/cadastrar', 'ParceirosController@cadastrar');
Route::get('/admin/parceiros/editar/{id}', 'ParceirosController@editar');
Route::post('/admin/parceiros/atualizar/{id}', 'ParceirosController@alterar');
Route::get('/admin/parceiros/exibir/{id}', 'ParceirosController@exibir');
Route::get('/admin/parceiros/excluir/{id}', 'ParceirosController@excluir');
/*Eventos*/
Route::get('/admin/eventos/painel', 'EventosController@listarElementos');
Route::post('/admin/eventos/verificar', 'EventosController@verificarBotao');
Route::get('/admin/eventos/novo', 'EventosController@novo');
Route::post('/admin/eventos/cadastrar', 'EventosController@cadastrar');
Route::get('/admin/eventos/editar/{id}', 'EventosController@editar');
Route::post('/admin/eventos/atualizar/{id}', 'EventosController@alterar');
Route::get('/admin/eventos/exibir/{id}', 'EventosController@exibir');
Route::get('/admin/eventos/excluir/{id}', 'EventosController@excluir');
/*Slider*/
Route::get('/admin/slider/painel', 'SliderController@listarElementos');
Route::post('/admin/slider/verificar', 'SliderController@verificarBotao');
Route::get('/admin/slider/novo', 'SliderController@novo');
Route::post('/admin/slider/cadastrar', 'SliderController@cadastrar');
Route::get('/admin/slider/editar/{id}', 'SliderController@editar');
Route::post('/admin/slider/atualizar/{id}', 'SliderController@alterar');
Route::get('/admin/slider/exibir/{id}', 'SliderController@exibir');
Route::get('/admin/slider/excluir/{id}', 'SliderController@excluir');

Auth::routes();
