@extends('layouts.app')
@section('title', 'Eventos')
@section('content')

<div class="container eventos">
	<div class="content">
		<div class="evento-info">
			@if(count($eventos) <= 1)	
				<img src="{{asset($eventos->imagem)}}" alt="$eventos->titulo">			
				<h2>{{$eventos->titulo}}</h2>
				<p>{{$eventos->descricao}}</p>
				@if($eventos->link != null)
					<p><strong>Mais informações: </strong> <a href="{{$eventos->link}}">{{$eventos->link}}</a></p>
				@endif	
			@else
				@foreach($eventos as $e) 
					<img src="{{asset($e->imagem)}}" alt="$e->titulo">			
					<h2>{{$e->titulo}}</h2>
					<?php
                        $grande = false;

                        if(strlen($e->descricao) > 500) {
                            $grande = true;
                            $diminuido = substr($e->descricao, 0, 500);                               
                            $e->descricao = substr($diminuido, 0, strrpos($diminuido, ' ')) . '...';
                        }
                        echo "<p>$e->descricao</p>";

                        if($grande)  {
                            echo "<span><a href='/eventos/$e->eventoEm/$e->id'>Continue lendo...</a></span>";                         
                        }
                    ?>
					@if($e->link != null)
						<p><strong>Mais informações: </strong> <a href="{{$e->link}}">{{$e->link}}</a></p>
					@endif
				@endforeach
			@endif
		</div>
	</div>
</div>
@endsection