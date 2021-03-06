@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('error')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">class</i> Editar Professor #{{$professor->id}}</h1>
                        </div>
                        <div class="body table-responsive">
                            <form action="{{ route('professors.update', $professor->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group @if($errors->has('nome')) has-error @endif">
                                    <label for="nome-field">Nome:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nome-field" name="nome" class="form-control" value="{{ is_null(old("nome")) ? $professor->nome : old("nome") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("nome"))
                                        <span class="help-block">{{ $errors->first("nome") }}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('cpf')) has-error @endif">
                                    <label for="nome-field">CPF:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="cpf-field" name="cpf" class="form-control" value="{{ is_null(old("cpf")) ? $professor->cpf : old("cpf") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("cpf"))
                                        <span class="help-block">{{ $errors->first("cpf") }}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('sexo')) has-error @endif">
                                    <label for="nome-field">Sexo:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="sexo-field" name="sexo">
                                                <option value="{{ is_null(old("sexo")) ? $professor->sexo : old("sexo") }}">-- Selecione --</option>
                                                <option value="masculino">Masculino</option>
                                                <option value="feminino">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    @if($errors->has("sexo"))
                                        <span class="help-block">{{ $errors->first("sexo") }}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('endereco')) has-error @endif">
                                    <label for="nome-field">Endereco:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="endereco-field" name="endereco" class="form-control" value="{{ is_null(old("endereco")) ? $professor->endereco : old("endereco") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("idade"))
                                        <span class="help-block">{{ $errors->first("endereco") }}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('telefone')) has-error @endif">
                                    <label for="nome-field">Telefone:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="telefone-field" name="telefone" class="form-control" value="{{ is_null(old("telefone")) ? $professor->telefone : old("telefone") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("idade"))
                                        <span class="help-block">{{ $errors->first("telefone") }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a class="btn btn-link pull-right" href="{{ route('professors.index') }}"><i class="material-icons">arrow_back</i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
@endsection