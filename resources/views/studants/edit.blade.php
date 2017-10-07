@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('error')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">class</i> Editar Aluno #{{$studant->id}}</h1>
                        </div>
                        <div class="body table-responsive">
                            <form action="{{ route('studants.update', $studant->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-sm-6">
                                    <div class="form-group @if($errors->has('nome')) has-error @endif">
                                        <label for="nome-field">Nome:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nome-field" name="nome" class="form-control" value="{{ is_null(old("nome")) ? $studant->nome : old("nome") }}"/>
                                            </div>
                                        </div>
                                        @if($errors->has("nome"))
                                            <span class="help-block">{{ $errors->first("nome") }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group @if($errors->has('cpf')) has-error @endif">
                                        <label for="nome-field">CPF:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="cpf-field" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" maxlength="11" placeholder="000.000.000-00" name="cpf" class="form-control" value="{{ is_null(old("cpf")) ? $studant->cpf : old("cpf") }}"/>
                                            </div>
                                        </div>
                                        @if($errors->has("nome"))
                                            <span class="help-block">{{ $errors->first("cpf") }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group @if($errors->has('idade')) has-error @endif">
                                        <label for="nome-field">Idade:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="idade-field" maxlength="2"  onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" name="idade" class="form-control" value="{{ is_null(old("idade")) ? $studant->idade : old("idade") }}"/>
                                            </div>
                                        </div>
                                        @if($errors->has("idade"))
                                            <span class="help-block">{{ $errors->first("idade") }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group @if($errors->has('sexo')) has-error @endif">
                                        <label for="nome-field">Sexo:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" id="sexo-field" name="sexo">
                                                    <option value="{{ is_null(old("sexo")) ? $studant->sexo : old("sexo") }}">-- Selecione --</option>
                                                    <option value="masculino">Masculino</option>
                                                    <option value="feminino">Feminino</option>
                                                </select>
                                            </div>
                                        </div>
                                        @if($errors->has("sexo"))
                                            <span class="help-block">{{ $errors->first("sexo") }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group @if($errors->has('telefone')) has-error @endif">
                                        <label for="nome-field">Telefone:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="tel" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" maxlength="11" id="telefone-field" name="telefone" class="form-control" value="{{ is_null(old("telefone")) ? $studant->telefone : old("telefone") }}"/>
                                            </div>
                                        </div>
                                        @if($errors->has("idade"))
                                            <span class="help-block">{{ $errors->first("telefone") }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group @if($errors->has('endereco')) has-error @endif">
                                        <label for="nome-field">Endereco:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="endereco-field" name="endereco" class="form-control" value="{{ is_null(old("endereco")) ? $studant->endereco : old("endereco") }}"/>
                                            </div>
                                        </div>
                                        @if($errors->has("idade"))
                                            <span class="help-block">{{ $errors->first("endereco") }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        @if( count($turmas)<1 )
                                            <br>
                                            <h5 class="red-text">
                                                Nenhum Turma encontrada!
                                            </h5>
                                            <br>
                                        @else
                                            <label for="turma">Turma: </label>
                                            <select class="form-control show-tick" name="turma" id="turma" required>


                                                @foreach($turmas as $turma)
                                                    <option value="{{$turma->id}}">{{$turma->nome}}</option>
                                                @endforeach


                                            </select>

                                        @endif

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <a class="btn btn-link pull-right" href="{{ route('studants.index') }}"><i class="material-icons">arrow_back</i></a>
                                </div>

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