@extends('layouts/admin')

@section('content')

	<div class="container detalhes">
		<div class="content">
			<div class="logo">
				<a href="{{ action('DestaquesController@listarElementos') }}"><img src="/img/logo.png" class="img-responsive" alt="Culturando" title="Clique aqui para voltar para o painel"></a>
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
				<h1>{{ $destaque->destaque }}</h1>
				<img class="img-responsive" src="{{ $destaque->imagem }}">
				<ul>
					<li><strong>Link: </strong><a href="{{ $destaque->link }}">{{ $destaque->link }}</a></li>
					<li><strong>Descrição: </strong>{{ $destaque->descricao }}</li>
				</ul>
			</div>			
		</div>
	</div>

@endsection