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
                    <a href="{{$s->link}}"><img src="{{asset($s->imagem)}}" alt="{{$s->titulo}}" title="{{$s->titulo}}"></a>
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
                            <img src="{{asset($d->imagem)}}" class="img-responsive" alt="{{$d->destaque}}" title="{{$d->destaque}}">
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
            <div class="eventos-baixada">

                <?php $c = 0;

                    foreach($eventosBaixada as $eventoB) {
                        if($c % 2 == 0) {
                            echo '<div class="content">';                                
                        }
                ?>
                        <div class="evento-item">
                            <a href="/eventos/Baixada Santista/{{$eventoB->id}}"><img src="{{asset($eventoB->imagem)}}" class="img-responsive" alt="{{$eventoB->titulo}}" title="{{$eventoB->titulo}}"></a>
                            <h3><a href="/eventos/Baixada Santista/{{$eventoB->id}}">{{$eventoB->titulo}}</a></h3>
                            
                            <?php echo "<p>" . cortarTexto($eventoB->descricao, 150) . "</p>";//não exibirá o resto do texto ?>
                            <span><a href="/eventos/Baixada Santista/{{$eventoB->id}}">Saiba mais</a></span>
                        </div>
                <?php       
                        $c++;

                        if($c % 2 == 0) {
                            echo '</div>';
                        }                       
                    }
                ?>
            </div>
             
            <div class="eventos-fora">  
                @foreach($eventosSP as $fora) 
                    <div class="content">
                        <div class="evento-item">
                            <a href="/eventos/São Paulo/{{$fora->id}}"><img src="{{asset($fora->imagem)}}" class="img-responsive" alt="{{$fora->titulo}}" title="{{$fora->titulo}}">
                            <h3>{{$fora->titulo}}</h3></a>

                            <?php echo "<p>" . cortarTexto($fora->descricao, 200) . "</p>"; ?>
                            <span><a href="/eventos/São Paulo/{{$fora->id}}">Saiba mais</a></span>
                        </div>
                    </div> 
                @endforeach 
            </div>    
        </div>          
    </div>

    <?php 
        function cortarTexto($texto, $tamanho) {

            if(strlen($texto) > $tamanho) {
                $diminuido = substr($texto, 0, $tamanho);                               
                $texto = substr($diminuido, 0, strrpos($diminuido, ' ')) . '...';
            }
            return $texto;
        }
    ?>
@endsection
