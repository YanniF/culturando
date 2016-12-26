@extends('layouts.app')
@section('title', 'Atrações')
@section('content')

	<div class="container detalhes">					
	@if(count($atr) > 0)
		<div class="content">
			<div class="atracoes-info">	
				<h2 class="titulo"><a href="/atracoes/{{$atr[0]->tipoAtracao}}/{{$atr[0]->cidade}}"> {{$atr[0]->tipoAtracao}} em {{$atr[0]->cidade}}</a></h2>
			</div>
		</div>
		@if(count($atr) <= 1)	
		<div class="content">
			<div class="atracoes-info">							
				<h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="/atracoes/{{$atr[0]->tipoAtracao}}/{{$atr[0]->cidade}}/{{$atr[0]->id}}">{{$atr[0]->nome}}</a></h3>
				@if($atr[0]->foto != null)<img class="img-responsive img-thumbnail" src="{{$atr[0]->foto}}">@endif
				<ul>
					@if($atr[0]->endereco != null)<li><strong>Endereço: </strong> {{$atr[0]->endereco}}</li>@endif
					<li><strong>Cidade: </strong>{{$atr[0]->cidade}}</li>
					@if($atr[0]->telefone != null)<li><strong>Telefone: </strong> {{$atr[0]->telefone}}</li>@endif
					@if($atr[0]->email != null)<li><strong>E-mail: </strong> {{$atr[0]->email}}</li>@endif
					@if($atr[0]->site != null)<li><strong>Site: </strong> <a href="{{$atr[0]->site}}" target="_blank">{{$atr[0]->site}}</a></li>@endif
					@if($atr[0]->descricao != null)<li><strong>Descrição: </strong> {{$atr[0]->descricao}}</li>@endif
				</ul>
			</div>
		</div>
		@else
			@foreach($atr as $a)	
			<div class="content">
				<div class="atracoes-info">					
					<h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="/atracoes/{{$a->tipoAtracao}}/{{$a->cidade}}/{{$a->id}}">{{$a->nome}}</a></h3>
					@if($a->foto != null)<img class="img-responsive img-thumbnail" src="{{$a->foto}}">@endif
					<ul>
						@if($a->endereco != null)<li><strong>Endereço: </strong> {{$a->endereco}}</li>@endif
						<li><strong>Cidade: </strong>{{$a->cidade}}</li>
						@if($a->telefone != null)<li><strong>Telefone: </strong> {{$a->telefone}}</li>@endif
						@if($a->email != null)<li><strong>E-mail: </strong> {{$a->email}}</li>@endif
						@if($a->site != null)<li><strong>Site: </strong> <a href="{{$a->site}}" target="_blank">{{$a->site}}</a></li>@endif
						@if($a->descricao != null)
							<li><strong>Descrição: </strong> 
							<?php 
								if(strlen($a->descricao) > 500) {
						            $diminuido = substr($a->descricao, 0, 500);                               
						            echo substr($diminuido, 0, strrpos($diminuido, ' ')) . '...';
						            echo "<span><a href=/atracoes/$a->tipoAtracao/$a->cidade/$a->id> Continue lendo </a></span>";
					            }
					            else {
					            	echo nl2br(e($a->descricao));
					            }
							?>							
							</li>  
						@endif
					</ul>
				</div>
			</div>
			@endforeach
		@endif		
	@else
		<div class="content">
			<div class="atracoes-info">
				<p>Não há informações a serem exibidas.</p>
			</div>
		</div>	
	@endif
	</div>

@endsection