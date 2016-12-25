@extends('layouts.app')
@section('title', 'No Vale do Ribeira Tem')
@section('content')

<div class="container detalhes">
	@foreach($valeTem as $vt)
		<div class="content">
			<div class="vale-info">
				<h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="/atracoes/{{$vt->tipoAtracao}}/{{$vt->cidade}}/{{$vt->id}}">{{$vt->nome}}</a></h3>
				@if($vt->foto != null)<img class="img-responsive img-thumbnail imagemModal" src="{{asset($vt->foto)}}" data-image="{{$vt->foto}}" data-toggle="modal" data-target="#modalImagem">@endif
				<ul>
					@if($vt->endereco != null)<li><strong>Endereço: </strong> {{$vt->endereco}}</li>@endif
					<li><strong>Cidade: </strong>{{$vt->cidade}}</li>
					@if($vt->telefone != null)<li><strong>Telefone: </strong> {{$vt->telefone}}</li>@endif
					@if($vt->email != null)<li><strong>E-mail: </strong> {{$vt->email}}</li>@endif
					@if($vt->site != null)<li><strong>Site: </strong> <a href="{{$vt->site}}" target="_blank">{{$vt->site}}</a></li>@endif
					@if($vt->descricao != null)
						<li><strong>Descrição: </strong> 
						<?php 
							if(strlen($vt->descricao) > 500) {
					            $diminuido = substr($vt->descricao, 0, 500);                               
					            echo substr($diminuido, 0, strrpos($diminuido, ' ')) . '...';
				        ?>
					            <span><a href="/atracoes/{{$vt->tipoAtracao}}/{{$vt->cidade}}/{{$vt->id}}"> Continue lendo </a></span>
			            <?php
			            	}
				            else {
				            	echo nl2br(e($a->descricao));
				            }
						?>							
						</li>  
					@endif
				</ul>
			</div>
		</div>
	@endforeach

	<div id="modalImagem" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
		    <div class="modal-content">
	        	<img class="foto" src="">
		    </div>
		</div>
	</div>
</div>

@endsection