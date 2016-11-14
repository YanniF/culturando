@extends('layouts/admin')

@section('content')

	<div class="container" id="painelEventos">
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
			<form class="form-horizontal" method="post" role="form" action="{{ url('/admin/eventos/verificar') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<div class="content"><h3>Selecione as informações que serão exibidas na tabela abaixo</h3></div>
				<div class="content">
					<div class="form-group">
						<label class="control-label" for="evento">Evento:</label>
						<div class="inputs">
							<select class="form-control" id="evento" name="evento">
								<option value="-">-</option>								
								<option value="baixada">Baixada Santista</option>
								<option value="vale">Vale do Ribeira</option>
								<option value="sp">São Paulo</option>
							</select>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="form-group">
						<div class="botao">
					    	<button type="submit" name="filtrar" value="filtrar" class="btn btn-default" title="Clique para filtrar as informações"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
					    </div>					    
					</div>
					<div class="form-group">
						<div class="botao">
					    	<button type="submit" name="cadastrar" value="cadastrar" class="btn btn-default" title="Clique para cadastrar um novo item"><span class="glyphicon glyphicon-plus"></span> Cadastrar</button>
					    </div>					    
					</div>
				</div>				
			</form>			
		</div>
		<div class="content">
			@if(old('titulo'))
				<div class="alert alert-success">
					<strong>Sucesso! </strong>Evento cadastrado com sucesso!
				</div>
			@endif
		</div>

		<div class="content">
			<h3>Lista dos eventos:</h3>
			<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Foto</th>
			        <th>Título</th>
			        <th>Tipo</th>
			        <th>Telefone</th>
			        <th>Cidade</th>
			        <th>Exibir</th>
			        <th>Editar</th>
			        <th>Excluir</th>
			      </tr>
			    </thead>
			    <tbody>
			    	@foreach($eventos as $e)
				    	<tr>
							<td><img class="img-responsive" src="{{ $e->foto }}" alt="{{ $e->nome }}" title="{{ $e->nome }}"></td>
							<td>{{ $e->nome }}</td>
							<td>{{ $e->tipoAtracao }}</td>
							<td>{{ $e->telefone }}</td>
							<td>{{ $e->cidade }}</td>
							<td><a class="btn btn-primary" href="{{ action('AtracoesController@exibir', $e->id) }}"><span class='glyphicon glyphicon-search'></span></a></td>
							<td><a class="btn btn-success" href="{{ action('AtracoesController@editar', $e->id) }}"><span class='glyphicon glyphicon-pencil'></span></a></td>
							<td><a class="btn btn-danger apagar" href="#" data-nome="eventos-{{ $e->nome }}" data-id="{{ $e->id}}"><span class='glyphicon glyphicon-remove'></span></a></td>
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
					<h4 class="modal-title">Evento</h4>
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