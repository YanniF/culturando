<!DOCTYPE html>
<html>
    <head>
        <title>Página não encontrada</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 4.5em;
                margin-bottom: 40px;
            }

            a {
                color: #444A4F;
                font-weight: bold;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Página não encontrada :(</div>
                <span><a href="{{action('HomeController@index')}}">Voltar para Culturando</a></span>
            </div>
        </div>
    </body>
</html>
