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
                                    <h1><i class="material-icons">add</i> Matricular</h1>
                                </div>
                                <div class="body table-responsive">
                                    <form action="{{ route('matriculas.store') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if( count($alunos)<1 )
                                            <br>
                                            <h5 class="red-text">
                                                Nenhum Aluno encontrado!
                                            </h5>
                                            <br>
                                        @else
                                            <div class="input-field">
                                                <select  name="aluno" id="aluno" required>


                                                    @foreach($alunos as $aluno)
                                                        <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                                                    @endforeach


                                                </select>
                                                <label for="aluno">Aluno</label>
                                            </div>
                                        @endif

                                        @if( count($turmas)<1 )
                                            <br>
                                            <h5 class="red-text">
                                                Nenhum Turma encontrada!
                                            </h5>
                                            <br>
                                        @else
                                            <div class="input-field">
                                                <select name="turma" id="turma" required>


                                                    @foreach($turmas as $turma)
                                                        <option value="{{$turma->id}}">{{$turma->nome}}</option>
                                                    @endforeach


                                                </select>
                                                <label for="turma">Turma</label>
                                            </div>
                                        @endif
                                        @if( ( count($turmas) < 1 ) || ( count($alunos) < 1 ) )
                                            <div class="center">
                                                <button class="btn disabled">Cadastrar</button>
                                            </div>
                                        @else

                                        <button type="submit" class="btn btn-primary">Criar</button>
                                        <a class="btn btn-link pull-right" href="{{ route('matriculas.index') }}"><i class="material-icons">arrow_back</i></a>
                                    @endif
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