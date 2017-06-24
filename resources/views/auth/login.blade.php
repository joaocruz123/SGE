
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{config('app.name')}}</title>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <p align="center"> <img src="/img/logoSGE.png" width="320" height="130"></p>
    </div>
    <div class="card">
        <div class="body">

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="msg">Faça login para iniciar uma sessão</div>
                <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>

                    <div class="form-line">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>

                    <div class="form-line">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Senha">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="rememberme" {{ old('remember') ? 'checked' : ''}} id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Lembre-me</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-blue waves-effect" type="submit">Login</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="{{url('/register')}}">Registre-se</a>
                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="{{ url('/password/reset') }}">Esqueceu sua senha?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="/plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="/plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="/js/admin.js"></script>
<script src="/js/pages/examples/sign-in.js"></script>
</body>

</html>

