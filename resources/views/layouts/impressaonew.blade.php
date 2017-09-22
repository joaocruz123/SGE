<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{asset('/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('/css/themes/all-themes.css')}}" rel="stylesheet" />

</head>
<body class="wrapper">
<div class="row">
    <div class="col-sm-12">
        <p align="center"><img src="{{public_path('img/ipad.jpg')}}" width="110" height="auto"/></p>
        <h4 style="text-align: center;"><strong>IPAD</strong></h4>
        <h5 style="text-align: center;"><strong>Igreja Pentecostal Assembleia de Deus</strong></h5>
        <h5 style="text-align: center;"><strong>Sistema de Gestão de Escola Bíblica Dominical</strong></h5>
    </div>
</div>
<br/>
@yield('content')
<br/>
</body>
<footer>
    <div class="container">
        <div class="row">
            Sistema desenvolvido por <a href="http://fb.com/Joao7dom">João Franco </a>
        </div>
        <div class="row">
            © Copyright 2017
        </div>
    </div>
</footer>
</html>