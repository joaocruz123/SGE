@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('error')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">class</i> Add Disciplinas a Turma #{{$turma->id}}</h1>
                        </div>
                        <div class="body table-responsive">
                            <form action="{{ url('/turma_disciplina_store/' . $turma->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('nome')) has-error @endif">
                                    <label for="nome-field">Nome:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nome-field" name="nome" class="form-control" value="{{ is_null(old("nome")) ? $turma->nome : old("nome") }}" disabled/>
                                            </div>
                                        </div>
                                    @if($errors->has("nome"))
                                        <span class="help-block">{{ $errors->first("nome") }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-11">
                                        
                                        <div class="form-group">
                                            @if( count($disciplinas)<1 )
                                                <br>
                                                <h5 class="red-text">
                                                    Nenhum Disciplina encontrada!
                                                </h5>
                                                <br>
                                            @else
                                                <label for="turma">Disciplinas: </label>
                                                <select class="form-control show-tick" name="disciplina" id="disciplina" required>
                                                    @foreach($disciplinas as $disciplina)
                                                        <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-1 m-t-20">
                                        <button class="btn btn-primary btn-sm pull-right" type="submit"><i class="material-icons">add</i></button>
                                    </div>
                                </div>                                
                            </div>
                            </form>
                            <br>
                            <a class="btn btn-link pull-right" href="{{ route('turmas.index') }}"><i class="material-icons">arrow_back</i></a>
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