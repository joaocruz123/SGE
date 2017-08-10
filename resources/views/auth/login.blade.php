@extends('layouts.log')
@section('box')
<div class="login-box">
    <div class="logo">
        <p align="center"> <img src="/img/logoSGE.png"></p>
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
@endsection
