@extends('layouts.app')
@section('title', 'No Vale do Ribeira Tem')
@section('content')

<div class="container">
	<div class="content">
		<div class="vale-info">
			@foreach($valeTem as $vt)
				<h3>{{$vt->nome}}</h3>
			@endforeach	
		</div>
	</div>
</div>

@endsection