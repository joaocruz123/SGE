@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('error')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">class</i> Editar Turmas #{{$turma->id}}</h1>
                        </div>
                        <div class="body table-responsive">
                            <form action="{{ route('turmas.update', $turma->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group @if($errors->has('nome')) has-error @endif">
                                    <label for="nome-field">Nome:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nome-field" name="nome" class="form-control" value="{{ is_null(old("nome")) ? $turma->nome : old("nome") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("nome"))
                                        <span class="help-block">{{ $errors->first("nome") }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a class="btn btn-link pull-right" href="{{ route('turmas.index') }}"><i class="material-icons">arrow_back</i></a>
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