@extends('layouts.app')
@section('title', 'Página Inicial')
@section('content')

<!-- Slider -->
    <div class="container" id="slider">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
        
            <div class="carousel-inner" role="listbox">
                <?php $c = 0; ?>
            @foreach($slider as $s)
                @if($c == 0)
                    <div class="item active">
                @else
                    <div class="item">
                @endif
                    <a href="{{$s->link}}"><img src="{{$s->imagem}}" alt="{{$s->titulo}}" title="{{$s->titulo}}"></a>
                    <div class="carousel-caption">                        
                        <h3><a href="{{$s->link}}">{{$s->titulo}}</a></h3>
                        <p><a href="{{$s->link}}">{{$s->mensagem}}</a></p>                        
                    </div>
                </div>
                <?php $c++; ?>
            @endforeach                
            </div>  

            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- Destaque -->
    <div id="destaque-titulo">
        <div class="container">
            <div class="content">
                <h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> <a href="{{action('HomeController@exibirDestaques')}}">DESTAQUE</a></h3>
            </div>
        </div>
    </div>
    <div id="destaque">
        <div class="container">
            <div class="content">
            @foreach($destaques as $d)
                <div class="destaque-item">
                    <a href="{{ action('HomeController@exibirDestaques', $d->id) }}"> 
                        <div class="fundo">
                            <img src="{{$d->imagem}}" class="img-responsive" alt="{{$d->destaque}}" title="{{$d->destaque}}">
                            <p>{{$d->destaque}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>      
    </div>

<!-- Eventos -->
    <div id="eventos">
        <div class="container">
            <div class="content">
                <h3 class="titulo evento1"><span class="glyphicon glyphicon-chevron-right"></span> <a href="{{action('HomeController@exibirEventos', 'Baixada Santista')}}">GALERIA DE EVENTOS</a></h3>
                <h3 class="titulo evento2"><span class="glyphicon glyphicon-chevron-right"></span> <a  href="{{action('HomeController@exibirEventos', 'São Paulo')}}">EVENTOS ESTADUAIS</a></h3>
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
                        <a href="/eventos/Baixada Santista/{{$eventoB->id}}"><img src="{{$eventoB->imagem}}" class="img-responsive" alt="{{$eventoB->titulo}}" title="{{$eventoB->titulo}}"></a>
                        <h3><a href="/eventos/Baixada Santista/{{$eventoB->id}}">{{$eventoB->titulo}}</a></h3>
                        
                        <?php echo "<p>" . cortarTexto($eventoB->descricao, 150) . "</p>";//não exibirá o resto do texto ?>
                        <span><a href="/eventos/Baixada Santista/{{$eventoB->id}}">Saiba mais</a></span>
                    </div>
            <?php 
                    $colunas++;

                    if($colunas % 2 == 0) {
                        echo '</div>';//fechando eventos-baixada

                        if($c < $qtdSp) {
            ?>    
                    <div class="eventos-fora">
                        <div class="evento-item">
                            <a href="/eventos/São Paulo/{{$eventosSP[$c]->id}}"><img src="{{$eventosSP[$c]->imagem}}" class="img-responsive" alt="{{$eventosSP[$c]->titulo}}" title="{{$eventosSP[$c]->titulo}}">
                            <h3>{{$eventosSP[$c]->titulo}}</h3></a>

                            <?php echo "<p>" . cortarTexto($eventosSP[$c]->descricao, 200) . "</p>"; ?>
                            <span><a href="/eventos/São Paulo/{{$eventosSP[$c]->id}">Saiba mais</a></span>
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

    <?php 
        function cortarTexto($texto, $tamanho) {
            $grande = false;

            if(strlen($texto) > $tamanho) {
                $grande = true;
                $diminuido = substr($texto, 0, $tamanho);                               
                $texto = substr($diminuido, 0, strrpos($diminuido, ' ')) . '...';
            }
            return $texto;
        }
    ?>
@endsection
