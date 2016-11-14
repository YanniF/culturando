@extends('layouts.admin')

@section('content')

	<div class="container" id="painelParceiros">
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
			@if(old('nome'))
				<div class="alert alert-success">
					<strong>Sucesso! </strong>Parceiro cadastrado com sucesso!
				</div>
			@endif
		</div>
		<div class="content">
			<div class="cabec">
				<h3>Lista dos parceiros:</h3>
				<div class="botao">
					<a href="{{ action('ParceirosController@novo') }}"class="btn btn-default" title="Clique para cadastrar um novo item"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
				</div>
				
			</div>			
			<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Imagem</th>
			        <th>Parceiro</th>
			        <th>Link</th>			        
			        <th>Exibir</th>
			        <th>Editar</th>
			        <th>Apagar</th>
			      </tr>
			    </thead>
			    <tbody>
			    	@foreach($parceiros as $p)
				    	<tr>
							<td><img class="img-responsive" src="{{ $p->imagem }}"></td>
							<td>{{ $p->nome }}</td>
							<td><a href="{{ $p->link }}">{{ $p->link }}</a></td>
							<td><a class="btn btn-primary" href="{{ action('ParceirosController@exibir', $p->id) }}"><span class='glyphicon glyphicon-search'></span></a></td>
							<td><a class="btn btn-success" href="{{ action('ParceirosController@editar', $p->id) }}"><span class='glyphicon glyphicon-pencil'></span></a></td>
							<td><a class="btn btn-danger apagar" href="#" data-nome="parceiros-{{ $p->nome }}" data-id="{{ $p->id}}"><span class='glyphicon glyphicon-remove'></span></a></td>
						</tr>
					@endforeach
			    </tbody>
			</table>
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