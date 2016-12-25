@extends('layouts.app')
@section('title', 'Parceiros')
@section('content')

<div class="container detalhes">
	<?php 
		$c = 0; 
		$qtd = count($parceiros); 
	?>
	<div class="content">
		<div class="parceiros-info">	
	@foreach($parceiros as $p)		
			<div class="parceiro-item">					
				<h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="{{$p->link}}">{{$p->nome}}</a></h3>
				<a href="{{$p->link}}" target="_blank"><img class="img-responsive img-thumbnail" src="{{asset($p->imagem)}}" alt="{{$p->nome}}" title="{{$p->nome}}"></a>
			</div>
		<?php $c++; ?>
		@if($c % 2 == 0)			
			</div>
		</div>
			@if($c < $qtd)
				<div class="content">
					<div class="parceiros-info">
			@endif
		@endif
		
	@endforeach	
		</div>
	</div>
</div>
@endsection