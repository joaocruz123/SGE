@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('error')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">mode_edit</i> Editar Categoria #{{$categorias_despesa->id}}</h1>
                        </div>
                        <div class="body table-responsive">

            <form action="{{ route('categorias_despesas.update', $categorias_despesa->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nome')) has-error @endif">
                       <label for="nome-field">Nome</label>
                    <input type="text" id="nome-field" name="nome" class="form-control" value="{{ is_null(old("nome")) ? $categorias_despesa->nome : old("nome") }}"/>
                       @if($errors->has("nome"))
                        <span class="help-block">{{ $errors->first("nome") }}</span>
                       @endif
                    </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-link pull-right" href="{{ route('categorias_despesas.index') }}"><i class="material-icons">arrow_back</i></a>

            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection