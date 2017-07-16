@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('error')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">mode_edit</i> Editar Receita #{{$renda->id}}</h1>
                        </div>
                        <div class="body table-responsive">

                            <form action="{{ route('rendas.update', $renda->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="aluno">Categoria: </label>
                                        <select class="form-control show-tick" name="categoria_despesa_id" id="categoria_despesa_id" required>
                                            @foreach($categorias_rendas as $categorias_renda)
                                                <option value="{{$categorias_renda->id}}">{{$categorias_renda->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group @if($errors->has('data')) has-error @endif">
                                    <label for="data-field">Nome</label>
                                    <input type="text" id="data-field" name="data" class="form-control" value="{{ is_null(old("data")) ? $renda->data : old("data") }}"/>
                                    @if($errors->has("data"))
                                        <span class="help-block">{{ $errors->first("data") }}</span>
                                    @endif
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group @if($errors->has('valor')) has-error @endif">
                                    <label for="valor-field">Nome</label>
                                    <input type="text" id="valor-field" name="valor" class="form-control" value="{{ is_null(old("valor")) ? $renda->valor : old("valor") }}"/>
                                    @if($errors->has("valor"))
                                        <span class="help-block">{{ $errors->first("valor") }}</span>
                                    @endif
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a class="btn btn-link pull-right" href="{{ route('rendas.index') }}"><i class="material-icons">arrow_back</i></a>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection