@extends('layouts.app')
@section('title', 'Parceiros')
@section('content')

	<div class="container parceiros">
		<div class="content">
			<div class="parceiros-info">
				@foreach($parceiros as $p)
					<h2>{{$p->nome}}</h2>
					<a href="{{$p->link}}"><img src="{{$p->imagem}}" alt="{{$p->nome}}" title="{{$p->nome}}"></a>
				@endforeach
			</div>
		</div>
	</div>
@endsection