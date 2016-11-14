@extends('layouts/admin')

@section('content')

	<div class="container" id="painel">
		<div class="content">
			<div class="logo">
				<a href="{{ action('PainelController@chamarPainel') }}"><img src="/img/logo.png" class="img-responsive" alt="Culturando" title="Clique aqui para voltar para o painel"></a>
			</div>
			<div class="logout">					
				<a href="{{ url('/logout') }}" class="btn btn-default" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<span class="glyphicon glyphicon-log-out"></span> Sair
				</a>
				<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
		            {{ csrf_field() }}
		        </form>
			</div>
		</div>
		<div class="content">
	        <h3>Escolha qual área você deseja acessar</h3>
			<div class="botoes">
				<a href="{{ action('AtracoesController@listarElementosPainel') }}" class="btn btn-default"><span class="glyphicon glyphicon-star"></span> Atrações</a>
				<a href="{{ action('DestaquesController@listarElementos') }}" class="btn btn-default"><span class="glyphicon glyphicon-star-empty"></span> Destaques</a>
				<a href="{{ action('EventosController@listarElementos') }}" class="btn btn-default"><span class="glyphicon glyphicon-star"></span> Eventos</a>
			</div>					
		</div>
		<div class="content">
			<div class="botoes">
				<a href="" class="btn btn-default"><span class="glyphicon glyphicon-star"></span> Galeria</a>
				<a href="{{ action('ParceirosController@listarElementos') }}" class="btn btn-default"><span class="glyphicon glyphicon-star-empty"></span> Parceiros</a>
				<a href="" class="btn btn-default"><span class="glyphicon glyphicon-star"></span> Slider</a>
			</div>					
		</div>
	</div>

@endsection