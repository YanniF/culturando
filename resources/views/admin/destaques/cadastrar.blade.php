@extends('layouts.admin')

@section('content')
	<div class="container cadastro">
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
		</div>
		<div class="content">
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
		</div>
		<div class="content">
			<form class="form-horizontal" method="post" role="form" action="{{ action('DestaquesController@cadastrar') }}" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="content">
					<div class="form-group">
				    	<label class="control-label" for="destaque">Título:</label>
					    <div class="inputs">
					    	<input type="text" class="form-control" id="destaque" name="destaque" value="{{ old('destaque') }}" required>
					    </div>
				  	</div>
				</div>
				<div class="content">
					<div class="form-group">
				    	<label class="control-label" for="imagem">Imagem:</label>
					    <div class="inputs">
					    	<input type="file" id="imagem" name="imagem" required>
					    	<span>Tamanho ideal: 250x170</span>
					    </div>
				  	</div>
				</div>
				<div class="content">
					<div class="form-group">		  			
				    	<label class="control-label" for="link">Link:</label>
					    <div class="inputs">
					    	<input type="url" class="form-control" id="link" name="link" value="{{ old('link') }}" title="Formato: http://www.site.com">
					    </div>
					 </div>	
				</div>							
			  	<div class="content">			  		
				  	<div class="form-group baixo">
						<label class="control-label" for="descricao">Descrição:</label>
						<div class="inputs">
							<textarea class="form-control" rows="10" id="descricao" name="descricao">{{ old('descricao') }}</textarea>
						</div>						
					</div>
			  	</div>
			  	
				<div class="content">
					<div class="form-group">
						<div class="botao">
					    	<button type="submit" name="salvar" class="btn btn-default" title="Clique aqui para salvar as informações"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
					    </div>					    
					</div>
					<div class="form-group">
						<div class="botao">
					    	<button type="reset" name="limpar" class="btn btn-default" title="Clique aqui para apagar as informações digitadas"><span class="glyphicon glyphicon-erase"></span> Limpar</button>
					    </div>
					</div>
				</div>				
			</form>
		</div>
	</div>

@endsection