@extends('layouts.app')

@section('content')
    @include('error')
    <section class="content">
        <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">add</i> Adicione uma turma</h1>
                        </div>
                        <div class="body table-responsive">
                            <form action="{{ route('turmas.store') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-sm-12">
                                <div class="form-group @if($errors->has('nome')) has-error @endif">
                                    <label for="nome-field">Nome:</label>
                                    <div class="form-group">
                                             <div class="form-line">
                                                <input type="text" id="nome-field" name="nome" class="form-control" value="{{ old("nome") }}" required/>
                                             </div>
                                         </div>
                                    @if($errors->has("nome"))
                                        <span class="help-block">{{ $errors->first("nome") }}</span>
                                    @endif
                                </div>
                                </div>
                                <br/>
                                <div class="foooter">
                                    <button type="submit" class="btn btn-primary">Criar</button>
                                    <a class="btn btn-link pull-right" href="{{ route('turmas.index') }}"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </section>
@endsection
