<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/plugins/plugins.css">  
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <header>
        <div class="container">
            <div class="content">
                <div class="logo">
                    <a href="{{ action('AtracoesController@criarMenu') }}">
                        <img src="img/logo.png" class="img-responsive" alt="Culturando" title="Culturando">
                    </a>
                </div><!-- logo -->
                <nav class="navbar navbar-default" id="menu1">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                      </div>
                    
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="#">NA BAIXADA TEM</a></li>
                            <li><a href="#">NO VALE TEM</a></li>
                            <li><a href="#">PARCEIROS</a></li>
                            <li><a href="#">GALERIA</a></li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CONTATO <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">FALE CONOSCO</a></li>
                                <li><a href="#">COMO PARTICIPAR</a></li>
                              </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div><!-- content -->
        </div><!-- container -->
    </header>   

    <!-- Menu -->
    <div id="navegacao">
        <div class="container">
            <div class="content">
                <div id="menu2">
                    <nav class="navbar navbar-default">                     

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="collapse navbar-collapse" id="navbar-collapse-2">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ action('AtracoesController@criarMenu') }}"><span class="glyphicon glyphicon-home"></span></a></li>
                                
                                @foreach($tipoAtracao as $atracao)
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ mb_strtoupper($atracao->tipo) }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-header">Baixada Santista</li>

                                            @foreach ($baixada as $cityB) 
                                                <li><a href="?p=atracoes&a={{ $atracao->tipo }}&c={{ $cityB->nome }}">{{ $cityB->nome }}</a></li>
                                            @endforeach

                                            <li role="separator" class="divider"></li>
                                            <li class="dropdown-header">Vale do Ribeira</li>

                                            @foreach ($vale as $cityV)
                                                <li><a href="?p=atracoes&a={{ $atracao->tipo }}&c={{ $cityV->nome }}">{{ $cityV->nome }}</a></li>
                                            @endforeach
                                        
                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav><!-- navbar-default -->
                </div><!-- menu2 -->                    
            </div><!-- content -->
        </div><!-- container -->            
    </div><!-- navegacao -->

    <!-- Slider -->
    <div id="slider">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="img/img-slider1.jpg" alt="Imagem1" title="Imagem1">
                    <div class="carousel-caption">
                        <a href="">
                            <h3>Título imagem1</h3>
                            <p>Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Suco de cevadiss deixa as pessoas mais interessantiss. </p>
                        </a>
                    </div>
                </div>

                <div class="item">
                    <img src="img/img-slider2.jpg" alt="Imagem2" title="Imagem2">
                    <div class="carousel-caption">
                        <a href="">
                            <h3>Título imagem2</h3>
                            <p>Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Suco de cevadiss deixa as pessoas mais interessantiss. </p>
                        </a>
                    </div>
                </div>

                <div class="item">
                    <img src="img/img-slider3.jpg" alt="Imagem3" title="Imagem3">
                    <div class="carousel-caption">
                        <a href="">
                            <h3>Título imagem3</h3>
                            <p>Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus. Suco de cevadiss deixa as pessoas mais interessantiss. </p>
                        </a>                        
                    </div>
                </div>
            </div>  

            <!-- Left and right controls -->
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
                <h3 class="titulo"><span class="glyphicon glyphicon-chevron-right"></span> DESTAQUE</h3>
            </div>
        </div>
    </div>
    <div id="destaque">
        <div class="container">
            <div class="content">
                <div class="destaque-item">
                    <a href=""> 
                        <div class="fundo">
                            <img src="img/destaque1.jpg" class="img-responsive" alt="Destaque 1" title="Destaque 1">
                            <p>Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus.</p>
                        </div>
                    </a>
                </div>
                <div class="destaque-item">
                    <a href=""> 
                        <div class="fundo">
                            <img src="img/destaque2.jpg" class="img-responsive" alt="Destaque 2" title="Destaque 2">
                            <p>Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus.</p>
                        </div>
                    </a>
                </div>
                <div class="destaque-item">
                    <a href="">
                        <div class="fundo">
                            <img src="img/destaque3.jpg" class="img-responsive" alt="Destaque 3" title="Destaque 3">
                            <p>Mussum Ipsum, cacilds vidis litro abertis. Atirei o pau no gatis, per gatis num morreus.</p>
                        </div>                      
                    </a>
                </div>
            </div>
        </div>      
    </div>

    @yield('content')

    <!-- Scripts -->
    <div class="scroll-top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </div>

    <footer>
        <div class="container">
            <div class="content">
                
            </div>
        </div>
    </footer>

    <script src="js/plugins/jquery/jquery-2.2.3.min.js"></script>
    <script src="js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
