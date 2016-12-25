@extends('layouts.app')
@section('title', 'Eventos')
@section('content')

<div class="container detalhes">	
	@if(count($eventos) <= 1)
		<div class="content">
			<div class="evento-info">
				<h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="/eventos/{{$eventos->eventoEm}}/{{$eventos->id}}">{{$eventos->titulo}}</a></h3>
				<a href="eventos/{{$eventos->eventoEm}}/{{$eventos->id}}"><img class="img-responsive img-thumbnail" src="{{asset($eventos->imagem)}}" alt="{{$eventos->titulo}}"></a>
				<p>{{$eventos->descricao}}</p>
				@if($eventos->link != null)
					<p><strong>Mais informações: </strong> <a href="{{$eventos->link}}">{{$eventos->link}}</a></p>
				@endif
			</div>	
		</div>	
	@else
		@foreach($eventos as $e)
		<div class="content">
			<div class="evento-info">
				<h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="/eventos/{{$e->eventoEm}}/{{$e->id}}">{{$e->titulo}}</a></h3>
				<a href="/eventos/{{$e->eventoEm}}/{{$e->id}}"><img class="img-responsive img-thumbnail" src="{{asset($e->imagem)}}" alt="$e->titulo"></a>	
				<?php
	                $grande = false;

	                if(strlen($e->descricao) > 800) {
	                    $grande = true;
	                    $diminuido = substr($e->descricao, 0, 800);                               
	                    $e->descricao = substr($diminuido, 0, strrpos($diminuido, ' ')) . '...';
	                }
	                echo "<p> " . nl2br(e($e->descricao)) . "</p>";

	                if($grande)  {
	                    echo "<span><a href='/eventos/$e->eventoEm/$e->id'>Continue lendo...</a></span>";                         
	                }
	            ?>
				@if($e->link != null)
					<p class="mais-informacoes"><strong>Mais informações: </strong> <a href="{{$e->link}}" target="_blank">{{$e->link}}</a></p>
				@endif
			</div>
		</div>
		@endforeach
	@endif
		
</div>
@endsection