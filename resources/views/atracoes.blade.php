@extends('layouts.app')
@section('title', 'Atrações')
@section('content')

	<div class="container detalhes">					
	@if(count($atr) > 0)
		<div class="content">
			<div class="atracoes-info">	
				<h2 class="titulo">{{$atr[0]->tipoAtracao}} em {{$atr[0]->cidade}}</h2>
			</div>
		</div>	
		@foreach($atr as $a)	
		<div class="content">
			<div class="atracoes-info">					
				<h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="#">{{$a->nome}}</a></h3>
				@if($a->foto != null)<img class="img-responsive img-thumbnail" src="{{$a->foto}}">@endif
				<ul>
					@if($a->endereco != null)<li><strong>Endereço: </strong> {{$a->endereco}}</li>@endif
					<li><strong>Cidade: </strong>{{$a->cidade}}</li>
					@if($a->telefone != null)<li><strong>Telefone: </strong> {{$a->telefone}}</li>@endif
					@if($a->email != null)<li><strong>E-mail: </strong> {{$a->email}}</li>@endif
					@if($a->site != null)<li><strong>Site: </strong> <a href="{{$a->site}}" target="_blank">{{$a->site}}</a></li>@endif
					@if($a->descricao != null)<li><strong>Descrição: </strong> {{$a->descricao}}</li>@endif
				</ul>
			</div>
		</div>
		@endforeach
				
	@else
		<div class="content">
			<div class="atracoes-info">
				<p>Não há informações a serem exibidas.</p>
			</div>
		</div>	
	@endif
	</div>

@endsection