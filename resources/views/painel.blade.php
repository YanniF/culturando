@extends('layouts.admin')

@section('content')

<div class="container" id="painel">
		<div class="content">
			<form class="form-horizontal" method="post" role="form">
				<div class="logo">
					<a href="?p=painel"><img src="../img/logo.png" class="img-responsive" alt="Culturando" title="culturando"></a>
				</div>
				<div class="content"><h3>Selecione as informações que serão exibidas na tabela abaixo</h3></div>
				<div class="content">
					<div class="form-group">
						<label class="control-label" for="selAtracao">Atração:</label>
						<div class="inputs">
							<select class="form-control" id="selAtracao" name="selAtracao">
								<option value="-">-</option>
								@foreach($atracoes as $atracao)
									<option value="{{ $atracao->tipo }}">{{ $atracao->tipo }}</option>
								@endforeach
							</select>
						</div>
					</div>	
				  	<div class="form-group">
						<label class="control-label" for="selCidade">Cidade:</label>
						<div class="inputs">
							<select class="form-control" id="selCidade" name="selCidade">
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
					    	<button type="submit" name="btnFiltrar" class="btn btn-default" title="Clique para filtrar as informações"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
					    </div>					    
					</div>
					<div class="form-group">
						<div class="botao">
					    	<button type="submit" name="btnCadastrar" class="btn btn-default" title="Clique para cadastrar um novo item"><span class="glyphicon glyphicon-plus"></span> Cadastrar</button>
					    </div>					    
					</div>
				</div>				
			</form>			
		</div><!-- content -->
		<div class="content">
			<h3>Lista das atrações:</h3>
			<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Foto</th>
			        <th>Nome</th>
			        <th>Tipo</th>
			        <th>Cidade</th>
			        <th>Visualizar</th>
			        <th>Editar</th>
			        <th>Excluir</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><button type='submit' name='btnVisu' class='btn btn-primary'><span class='glyphicon glyphicon-search'></span></button></td>
					<td><button type='submit' name='btnEditar' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></td>
					<td><button type='submit' name='btnApagar' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></td>
					</tr>
			    </tbody>
			</table>
		</div>		
	</div><!-- container -->

@endsection