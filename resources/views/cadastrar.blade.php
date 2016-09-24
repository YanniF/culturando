@extends('layouts.admin')

@section('content')
	<div class="container" id="cadastro">
		<div class="content">
			<form class="form-horizontal" method="post" role="form">
				<div class="logo">
					<a href="?p=painel"><img src="../img/logo.png" class="img-responsive" alt="Culturando" title="Culturando"></a>
				</div>				
				<div class="content">
					<div class="form-group">
				    	<label class="control-label" for="nome">Nome:</label>
					    <div class="inputs">
					    	<input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
					    </div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label" for="tipoAtracao">Atração:</label>
						<div class="inputs">
							<select class="form-control" id="tipoAtracao" name="tipoAtracao">						 	
								@foreach($atracoes as $atracao)
									<option value="{{ $atracao->tipo }}">{{ $atracao->tipo }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="form-group">
				    	<label class="control-label" for="endereco">Endereço:</label>
					    <div class="inputs">
					    	<input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}" required>
					    </div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label" for="cidade">Cidade:</label>
						<div class="inputs">
							<select class="form-control" id="cidade" name="cidade">
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
				    	<label class="control-label" for="telefone">Telefone:</label>
					    <div class="inputs">
					    	<input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}">
					    </div>
				  	</div>
				  	<div class="form-group">
				    	<label class="control-label" for="email">E-mail:</label>
					    <div class="inputs">
					    	<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
					    </div>
				  	</div>
				</div>
				<div class="content">
					<div class="form-group">		  			
				    	<label class="control-label" for="site">Site:</label>
					    <div class="inputs">
					    	<input type="text" class="form-control" id="site" name="site" value="{{ old('site') }}">
					    </div>
					 </div>
					<div class="form-group">
				    	<label class="control-label" for="foto">Foto:</label>
					    <div class="inputs">
					    	<input type="file" id="foto" name="foto">
					    </div>
				  	</div>
				</div>				
			  	<div class="content">			  		
				  	<div class="form-group baixo">
						<label class="control-label" for="descricao">Descrição:</label>
						<div class="inputs">
							<textarea class="form-control" rows="5" id="descricao" name="descricao" value="{{ old('descricao') }}"></textarea>
						</div>						
					</div>
			  	</div>
			  	
				<div class="content">
					<div class="form-group">
						<div class="botao">
					    	<button type="submit" name="btnSalvar" class="btn btn-default" title="Clique aqui para salvar as informações"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
					    </div>					    
					</div>
					<div class="form-group">
						<div class="botao">
					    	<button type="reset" name="btnLimpar" class="btn btn-default" title="Clique aqui para apagar as informações digitadas"><span class="glyphicon glyphicon-erase"></span> Limpar</button>
					    </div>
					</div>
				</div>				
			</form>
		</div>
	</div>

@endsection