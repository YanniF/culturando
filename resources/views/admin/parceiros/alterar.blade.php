@extends('layouts.admin')

@section('content')
	<div class="container" id="cadastro">
		<div class="content">
			<div class="logo">
				<a href="{{ action('ParceirosController@listarElementos') }}"><img src="/img/logo.png" class="img-responsive" alt="Culturando" title="Clique aqui para voltar para o painel"></a>
			</div>
			<div class="logout">					
				<a href="{{ url('/logout') }}" class="btn btn-default" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<span class="glyphicon glyphicon-log-out"></span> Sair
				</a>
				<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
		            {{ csrf_field() }}
		        </form>
			</div>

			<form class="form-horizontal" method="post" role="form" action="{{ action('ParceirosController@alterar', $p->id) }}" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="content">
					<div class="form-group">
				    	<label class="control-label" for="nome">Parceiro:</label>
					    <div class="inputs">
					    	<input type="text" class="form-control" id="nome" name="nome" value="{{ $p->nome }}" required>
					    </div>
				  	</div>
				</div>				
				<div class="content">
					<div class="form-group">
				    	<label class="control-label" for="imagem">Imagem:</label>
					    <div class="inputs">
					    	<input type="file" id="imagem" name="imagem">
					    </div>
				  	</div>
				</div>
				<div class="content">  	
				  	<div class="form-group">		  			
				    	<label class="control-label" for="link">Link:</label>
					    <div class="inputs">
					    	<input type="url" class="form-control" id="link" name="link" value="{{ $p->link }}" title="Formato: http://www.site.com">
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