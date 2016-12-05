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
                ?>
                @foreach($eventosBaixada as $eventoB)
                    <?php echo $classe; ?>
                    <div class="evento-item">
                        <a href=""><img src="img/evento1.jpg" class="img-responsive" alt="Evento" title="Evento"></a>
                        <h3><a href="">{{$eventoB->titulo}}</a></h3>
                        <p>Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Suco de cevadiss deixa as pessoas mais interessantiss.</p>
                        <span><a href="">Saiba mais</a></span>
                    </div>
                    <?php 
                        $colunas++;

                        if($colunas % 2 == 0) {
                            echo '</div>';//fechando eventos-baixada

                            if($c < $qtdSp) {

                    ?>    
                            <div class="eventos-fora">
                                <div class="evento-item">
                                    <a href=""><img src="img/mapCultural.jpg" class="img-responsive" alt="Evento" title="Evento">
                                    <h3>{{$eventosSP[$c]->titulo}}</h3></a>
                                    <p>Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Suco de cevadiss deixa as pessoas mais interessantiss.</p>
                                </div>
                            </div>
                        </div>
                    <?php
                            $c++;
                        }
                            if($c == $qtdSp && $colunas > $qtdBaixada) {
                                echo '';
                            }
                            else {
                                echo '<div class="content">'; 
                            }
                            
                            $classe = '<div class="eventos-baixada">';                            
                        }
                        else {
                            $classe = ''; 
                        }
                    ?>
                @endforeach                
                </div> 
                 </div>  
            </div> 
        </div>          
    </div>
@endsection
