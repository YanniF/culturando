@extends('layouts/admin')

@section('content')

	<div class="container" id="painel">
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
			<form class="form-horizontal" method="post" role="form" action="{{ url('/admin/verificar') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<div class="content"><h3>Selecione as informações que serão exibidas na tabela abaixo</h3></div>
				<div class="content">
					<div class="form-group">
						<label class="control-label" for="tipoAtracao">Atração:</label>
						<div class="inputs">
							<select class="form-control" id="tipoAtracao" name="tipoAtracao">
								<option value="-">-</option>
								@foreach($tipoAtracao as $atracao)
									<option value="{{ $atracao->tipo }}">{{ $atracao->tipo }}</option>
								@endforeach
							</select>
						</div>
					</div>	
				  	<div class="form-group">
						<label class="control-label" for="cidade">Cidade:</label>
						<div class="inputs">
							<select class="form-control" id="cidade" name="cidade">
								<option value="-">-</option>
							 	<optgroup label="Baixada Santista">							 		
							 		@foreach($baixada as $cityB)
										<option value="{{ $cityB->nome }}">{{ $cityB->nome }}</option>
							 		@endforeach
								</optgroup>
								<optgroup label="Vale do Ribeira">
									@foreach($vale as $cityV)
										<option value="{{ $cityV->nome }}">{{ $cityV->nome }}</option>
							 		@endforeach
								</optgroup>
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
		</div><!-- content -->
		<div class="content">
			@if(old('nome'))
				<div class="alert alert-success"> <!-- o old pega os dados enviados por redirect -->
					<strong>Sucesso! </strong>Atração cadastrada com sucesso!
				</div>
			@endif
		</div>		

		<div class="content">
			<h3>Lista das atrações:</h3>
			<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Foto</th>
			        <th>Nome</th>
			        <th>Tipo</th>
			        <th>Telefone</th>
			        <th>Cidade</th>
			        <th>Exibir</th>
			        <th>Editar</th>
			        <th>Excluir</th>
			      </tr>
			    </thead>
			    <tbody>
			    	@foreach($atracoes as $a)
				    	<tr>
							<td><img class="img-responsive" src="{{ $a->foto }}" alt="{{ $a->nome }}" title="{{ $a->nome }}"></td>
							<td>{{ $a->nome }}</td>
							<td>{{ $a->tipoAtracao }}</td>
							<td>{{ $a->telefone }}</td>
							<td>{{ $a->cidade }}</td>
							<td><a class="btn btn-primary" href="{{ action('AtracoesController@exibir', $a->id) }}"><span class='glyphicon glyphicon-search'></span></a></td>
							<td><a class="btn btn-success" href=""><span class='glyphicon glyphicon-pencil'></span></a></td>
							<td><a class="btn btn-danger" href="{{ action('AtracoesController@excluir', $a->id) }}"><span class='glyphicon glyphicon-remove'></span></a></td>							
						</tr>
					@endforeach
			    </tbody>
			</table>
		</div>		
	</div><!-- container -->

@endsection