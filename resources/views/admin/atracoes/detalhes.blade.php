@extends('layouts/admin')

@section('content')

	<div class="container detalhes">
		<div class="content">
			<div class="logo">
				<a href="{{ action('AtracoesController@listarElementosPainel') }}"><img src="/img/logo.png" class="img-responsive" alt="Culturando" title="Clique aqui para voltar para o painel"></a>
			</div>
			<div class="logout">					
				<a href="{{ url('/logout') }}" class="btn btn-default" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<span class="glyphicon glyphicon-log-out"></span> Sair
				</a>
				<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
		            {{ csrf_field() }}
		        </form>
			</div>
			<div class="info">
				<h1>{{ $atracao->nome }}</h1>
				<img class="img-responsive" src="{{ $atracao->foto }}">
				<ul>
					<li><strong>Tipo: </strong>{{ $atracao->tipoAtracao }}</li>
					<li><strong>Endereço: </strong>{{ $atracao->endereco }}</li>
					<li><strong>Cidade: </strong>{{ $atracao->cidade }}</li>
					<li><strong>Telefone: </strong>{{ $atracao->telefone }}</li>
					<li><strong>E-mail: </strong><a href="mailto:{{ $atracao->email }}">{{ $atracao->email }}</a></li>
					<li><strong>Site: </strong><a href="{{ $atracao->site }}">{{ $atracao->site }}</a></li>
					<li><strong>Descrição: </strong>{{ $atracao->descricao }}</li>
				</ul>
			</div>			
		</div>
	</div>

@endsection