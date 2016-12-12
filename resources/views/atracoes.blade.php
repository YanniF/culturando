@extends('layouts.app')
@section('title', 'Atrações')
@section('content')

	<div class="container atracoes">
		<div class="content">
			<div class="atracoes-info">				
				@if(count($atr) > 0)
					<h1>{{$atr[0]->tipoAtracao}} em {{$atr[0]->cidade}}</h1>

					@foreach($atr as $a)
						<h2>{{$a->nome}}</h2>
					@endforeach
				@else
					<p>Não há informações a serem exibidas.</p>
				@endif
			</div>			
		</div>
	</div>

@endsection