@extends('layouts.app')
@section('title', 'Destaques')
@section('content')

<div class="container detalhes">	
	@if(count($destaques) <= 1)	
		<div class="content">
			<div class="destaque-info">
				<h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="{{action('HomeController@exibirDestaques', $destaques->id)}}">{{$destaques->destaque}}</a></h3>
				<a href="{{action('HomeController@exibirDestaques', $destaques->id)}}"><img class="img-responsive img-thumbnail" src="{{asset($destaques->imagem)}}" alt="$destaques->destaque"></a>
				<p>{{$destaques->descricao}}</p>
				
				@if($destaques->link != null)
					<p><strong>Mais informações: </strong> <a href="{{$destaques->link}}" target="_blank">{{$destaques->link}}</a></p>
				@endif
			</div>
		</div>							
	@else
		@foreach($destaques as $d) 
		<div class="content">
			<div class="destaque-info">							
				<h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="{{action('HomeController@exibirDestaques', $d->id)}}">{{$d->destaque}}</a></h3>
				<a href="{{action('HomeController@exibirDestaques', $d->id)}}"><img class="img-responsive img-thumbnail" src="{{asset($d->imagem)}}" alt="$d->destaque"></a>
				<?php
	                $grande = false;

	                if(strlen($d->descricao) > 1000) {
	                    $grande = true;
	                    $cortado = substr($d->descricao, 0, 1000);                               
	                    $d->descricao = substr($cortado, 0, strrpos($cortado, ' ')) . '...';
	                }
	                echo "<p> " . nl2br(e($d->descricao)) . "</p>";//usado o nl2br pq a formatação foi alterada somente para a exibição de conteúdo com {{}}

	                if($grande)  {
	                    echo "<span><a href='" . action('HomeController@exibirDestaques', $d->id) . "'>Continue lendo...</a></span>";                         
	                }
	            ?>
				@if($d->link != null)
					<p class="mais-informacoes"><strong>Mais informações: </strong> <a href="{{$d->link}}" target="_blank">{{$d->link}}</a></p>
				@endif
			</div>
		</div>	
		@endforeach
	@endif
</div>
@endsection