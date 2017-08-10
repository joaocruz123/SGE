@extends('layouts.log')

@section('box')
    <div class="login-box">
        <div class="logo">
            <p align="center"> <img src="/img/logoSGE.png"></p>
        </div>
        <div class="card">
            <div class="body">

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <div class="msg">Registre -se</div>
                    <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>

                        <div class="form-line">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Nome e Sobrenome">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>

                        <div class="form-line">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Seu e-mail">

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
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Sua senha">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme a senha">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-lg bg-blue waves-effect">
                        <strong>Registre-se</strong>
                    </button>
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{'/'}}">Você já é registrado?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
