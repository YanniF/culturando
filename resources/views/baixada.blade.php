@extends('layouts.app')
@section('title', 'Na Baixada Tem')
@section('content')

<div class="container detalhes">	
	@foreach($baixadaTem as $bt)
		<div class="content">
			<div class="baixada-info">
				<h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="/atracoes/{{$bt->tipoAtracao}}/{{$bt->cidade}}/{{$bt->id}}">{{$bt->nome}}</a></h3>
				@if($bt->foto != null)<img class="img-responsive img-thumbnail" src="{{$bt->foto}}">@endif
				<ul>
					@if($bt->endereco != null)<li><strong>Endereço: </strong> {{$bt->endereco}}</li>@endif
					<li><strong>Cidade: </strong>{{$bt->cidade}}</li>
					@if($bt->telefone != null)<li><strong>Telefone: </strong> {{$bt->telefone}}</li>@endif
					@if($bt->email != null)<li><strong>E-mail: </strong> {{$bt->email}}</li>@endif
					@if($bt->site != null)<li><strong>Site: </strong> <a href="{{$bt->site}}" target="_blank">{{$bt->site}}</a></li>@endif
					@if($bt->descricao != null)
						<li><strong>Descrição: </strong> 
						<?php 
							if(strlen($bt->descricao) > 500) {
					            $diminuido = substr($bt->descricao, 0, 500);                               
					            echo substr($diminuido, 0, strrpos($diminuido, ' ')) . '...';
					            echo "<span><a href=/atracoes/$bt->tipoAtracao/$bt->cidade/$bt->id> Continue lendo </a></span>";
				            }
				            else {
				            	echo $bt->descricao;
				            }
						?>							
						</li>  
					@endif
				</ul>
			</div>
		</div>
	@endforeach		
</div>

@endsection