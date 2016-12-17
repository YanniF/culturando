@extends('layouts.app')
@section('title', 'Na Baixada Tem')
@section('content')

<div class="container">
	<div class="content">
		<div class="baixada-info">
			@foreach($baixadaTem as $bt)
				<h3>{{$bt->nome}}</h3>
			@endforeach	
		</div>
	</div>
</div>

@endsection