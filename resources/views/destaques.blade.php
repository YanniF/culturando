@extends('layouts.app')
@section('title', 'Destaques')
@section('content')

<div class="container destaque">
	<div class="content">
		<div class="destaque-info">
			@if(count($destaques) <= 1)	
				<img src="{{asset($destaques->imagem)}}" alt="$destaques->destaque">			
				<h2>{{$destaques->destaque}}</h2>
				<p>{{$destaques->descricao}}</p>
				@if($destaques->link != null)
					<p><strong>Mais informações: </strong> <a href="{{$destaques->link}}">{{$destaques->link}}</a></p>
				@endif	
			@else
				@foreach($destaques as $d) 
					<img src="{{asset($d->imagem)}}" alt="$d->destaque">			
					<h2>{{$d->destaque}}</h2>
					<?php
                        $grande = false;

                        if(strlen($d->descricao) > 800) {
                            $grande = true;
                            $cortado = substr($d->descricao, 0, 800);                               
                            $d->descricao = substr($cortado, 0, strrpos($cortado, ' ')) . '...';
                        }
                        echo "<p>$d->descricao</p>";

                        if($grande)  {
                            echo "<span><a href='" . action('HomeController@exibirDestaques', $d->id) . "'>Continue lendo...</a></span>";                         
                        }
                    ?>
					@if($d->link != null)
						<p><strong>Mais informações: </strong> <a href="{{$d->link}}">{{$d->link}}</a></p>
					@endif
				@endforeach
			@endif
		</div>
	</div>
</div>
@endsection