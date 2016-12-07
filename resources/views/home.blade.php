@extends('layouts.app')
@section('title', 'Página Inicial')
@section('content')
<!-- Eventos -->
    <div id="eventos">
        <div class="container">
            <div class="content">
                <h3 class="titulo" id="evento1"><span class="glyphicon glyphicon-chevron-right"></span> EVENTOS NA BAIXADA E VALE</h3>
                <h3 class="titulo" id="evento2"><span class="glyphicon glyphicon-chevron-right"></span> EVENTOS EM SP</h3>
            </div>
            <div class="content">
            <?php 
                //arrumar código
                $classe = '<div class="eventos-baixada">';                    
                $colunas = 0;
                $qtdSp = count($eventosSP); 
                $qtdBaixada = count($eventosBaixada);
                $c = 0;
                
                foreach($eventosBaixada as $eventoB) {
                    echo $classe; 
            ?>
                    <div class="evento-item">
                        <a href="/eventos/exibir/Baixada Santista/{{$eventoB->id}}"><img src="{{$eventoB->imagem}}" class="img-responsive" alt="{{$eventoB->titulo}}" title="{{$eventoB->titulo}}"></a>
                        <h3><a href="/eventos/exibir/Baixada Santista/{{$eventoB->id}}">{{$eventoB->titulo}}</a></h3>
                        <p>{{$eventoB->descricao}}</p>
                        <span><a href="/eventos/exibir/Baixada Santista/{{$eventoB->id}}">Saiba mais</a></span>
                    </div>
            <?php 
                    $colunas++;

                    if($colunas % 2 == 0) {
                        echo '</div>';//fechando eventos-baixada

                        if($c < $qtdSp) {

            ?>    
                    <div class="eventos-fora">
                        <div class="evento-item">
                            <a href="/eventos/exibir/São Paulo/{{$eventosSP[$c]->id}}"><img src="{{$eventosSP[$c]->imagem}}" class="img-responsive" alt="{{$eventosSP[$c]->titulo}}" title="{{$eventosSP[$c]->titulo}}">
                            <h3>{{$eventosSP[$c]->titulo}}</h3></a>
                            <p>{{$eventosSP[$c]->descricao}}</p>
                            <span><a href="/eventos/exibir/São Paulo/{{$eventosSP[$c]->id}">Saiba mais</a></span>
                        </div>
                    </div>
                </div>

            <?php
                            $c++;
                        }
                        if($c >= $qtdSp && $colunas >= $qtdBaixada) {
                            echo '</div> ';
                        }
                        else {
                            echo '<div class="content">'; 
                        }
                        
                        $classe = '<div class="eventos-baixada">';                            
                    }
                    else {
                        $classe = ''; 
                    }                    
                }   
            ?>             
                    
                </div>  
            </div> 
        </div>          
    </div>
@endsection
