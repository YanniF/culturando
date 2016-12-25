<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Culturando - O que fazer na Baixada Santista e Vale do Ribeira">
    <meta name="keywords" content="Culturando, Baixada Santista, Vale do Ribeira, Santos, São Vicente, Praia Grande,
    cultura, lazer, teatro, cultura na rua, galeria de arte, turismo, museu, biblioteca">
    <meta name="author" content="Yanni Fraga">
    <meta name="robots" content="index, follow">

    <meta property="og:url"  content="https://culturando.com.br" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Culturando" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="Culturando - O que fazer na Baixada Santista e Vale do Ribeira"/>

    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather" > 
    <link rel="stylesheet" href="{{ asset('css/plugins/plugins.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
                    <a href="{{ action('HomeController@index') }}">
                        <img src="{{asset('/img/logo.png')}}" class="img-responsive" alt="Culturando" title="Culturando">
                    </a>
                </div>
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
                            <li><a href="{{action('HomeController@baixadaTem')}}">NA BAIXADA TEM</a></li>
                            <li><a href="{{action('HomeController@valeTem')}}">NO VALE TEM</a></li>
                            <li><a href="{{action('HomeController@exibirParceiros')}}">PARCEIROS</a></li>
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
            </div>
        </div>
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
                                <li><a href="{{ action('HomeController@index') }}"><span class="glyphicon glyphicon-home"></span></a></li>
                                
                                @foreach($tipoAtracao as $atracao)
                                    <li class="dropdown">
                                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ mb_strtoupper($atracao->tipo) }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-header">Baixada Santista</li>
                                            @foreach ($baixada as $cityB)
                                                <li><a href="{{ url('atracoes', ['tipo' => $atracao->tipo,'cidade' => $cityB->nome]) }}">{{ $cityB->nome }}</a></li>
                                            @endforeach

                                            <li role="separator" class="divider"></li>
                                            <li class="dropdown-header">Vale do Ribeira</li>

                                            @foreach ($vale as $cityV)
                                                <li><a href="{{ action('HomeController@exibirAtracoes', ['tipo' => $atracao->tipo,'cidade' => $cityV->nome]) }}">{{ $cityV->nome }}</a></li>
                                            @endforeach                                        
                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>           
    </div>

    @yield('content')

    <div class="scroll-top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </div>

    <footer>
        <div class="container">
            <div class="content">
                <div class="mapa">
                    <a href="{{action('HomeController@baixadaTem')}}">NA BAIXADA TEM</a>
                </div>
                <div class="mapa">
                    <a href="{{action('HomeController@valeTem')}}">NO VALE TEM</a>
                </div>
                <div class="mapa">
                    <a href="{{action('HomeController@exibirParceiros')}}">PARCEIROS</a>
                </div>
                <div class="mapa">
                    <a href="">CONTATO</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('/js/plugins/jquery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>