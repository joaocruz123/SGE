@extends('layouts.app')

@section('content')
    @include('error')
    <section class="content">
        <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h1><i class="material-icons">picture_in_picture</i> Matricular</h1>
                                </div>
                                <div class="body table-responsive">
                                    <form action="{{ route('matriculas.store') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                        @if( count($alunos)<1 )
                                            <br>
                                            <h5 class="red-text">
                                                Nenhum Aluno encontrado!
                                            </h5>
                                            <br>
                                        @else
                                                <label for="aluno">Aluno: </label>
                                                <select class="form-control show-tick" name="aluno" id="aluno" required>


                                                    @foreach($alunos as $aluno)
                                                        <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                                                    @endforeach


                                                </select>
                                        @endif
                                        </div>
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
                                        <div class="footer">
                                        @if( ( count($turmas) < 1 ) || ( count($alunos) < 1 ) )
                                            <div class="center">
                                                <button class="btn disabled">Cadastrar</button>
                                            </div>
                                        @else

                                        <button type="submit" class="btn btn-primary">Criar</button>
                                        <a class="btn btn-link pull-right" href="{{ route('matriculas.index') }}"><i class="material-icons">arrow_back</i></a>
                                    @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

@endsection