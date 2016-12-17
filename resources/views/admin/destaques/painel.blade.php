@extends('layouts.admin')

@section('content')

	<div class="container" id="painelDestaques">
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
			@if(old('destaque'))
				<div class="alert alert-success"> <!-- o old pega os dados enviados por redirect -->
					<strong>Sucesso! </strong>Destaque cadastrado com sucesso!
				</div>
			@endif
		</div>
		<div class="content">
			<div class="cabec">
				<h3>Lista dos destaques:</h3>
				<div class="botao">
					<a href="{{ action('DestaquesController@novo') }}"class="btn btn-default" title="Clique para cadastrar um novo item"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
				</div>
				
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Imagem</th>
				        <th>Título</th>
				        <th>Descrição</th>
				        <th>Exibir</th>
				        <th>Editar</th>
				        <th>Apagar</th>
				      </tr>
				    </thead>
				    <tbody>
				    	@foreach($destaques as $d)
					    	<tr>
								<td><img class="img-responsive" src="{{ $d->imagem }}"></td>
								<td>{{ $d->destaque }}</td>
								<td>{{ $d->descricao }}</td>
								<td><a class="btn btn-primary" href="{{ action('DestaquesController@exibir', $d->id) }}"><span class='glyphicon glyphicon-search'></span></a></td>
								<td><a class="btn btn-success" href="{{ action('DestaquesController@editar', $d->id) }}"><span class='glyphicon glyphicon-pencil'></span></a></td>
								<td><a class="btn btn-danger apagar" href="#" data-nome="destaques-{{ $d->destaque }}" data-id="{{ $d->id}}"><span class='glyphicon glyphicon-remove'></span></a></td>
							</tr>
						@endforeach
				    </tbody>
				</table>
			</div>				
		</div>
		<div id="apagarModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Destaque</h4>
					</div>
					<div class="modal-body">
						<p class="nome"></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-default apagar-sim">Sim</a>
						<a href="#" class="btn btn-default" data-dismiss="modal">Não</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection