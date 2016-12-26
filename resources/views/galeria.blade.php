@extends('layouts.app')
@section('title', 'Na Baixada Tem')
@section('content')

	<div class="container detalhes">
		<div class="content">
			<div class="galeria-info">
				<h2>Galeria</h2>
			</div>
		</div>
		@if(count($galeria) > 0)
		<?php $c = 0; ?>

		@foreach($galeria  as $g)
			@if($c % 4 == 0)
				<div class="content">
					<div class="galeria-info">
			@endif					
					<a class="fancybox" rel="group" href="{{$g->imagem}}"><img class="img-thumbnail" src="{{$g->imagem}}" alt="{{$g->titulo}}"></a></li>
						
			<?php $c++; ?>

			@if($c % 4 == 0)			
					</div>
				</div>
			@endif
		@endforeach
		@else
			<div class="content">
				<div class="galeria-info">
					<p>Não há imagens.</p>	
				</div>			
			</div>
		@endif
			</div>
		</div>
	</div>	

@endsection