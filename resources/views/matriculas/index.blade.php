@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="pull-right">
                                <a href="{{ route('matriculas.create') }}"><button type="button" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Nova Matricula</button></a>
                            </div>
                            {!! Form::open(['method' => 'GET', 'url' => '/matriculas',  'role' => 'turma']) !!}
                            @if( count($turmas)<1 )
                                <br>
                                <h5 class="red-text">
                                    Nenhum Turma encontrada!
                                </h5>
                                <br>
                            @else
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control" name="turma" id="turma" required>
                                                @foreach($turmas as $turma)
                                                    <option value="{{$turma->id}}">{{$turma->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            <div class="col-sm-1">

                                <button type="submit" class="btn-primary btn-circle"><i class="material-icons">search</i> </button>
                            </div>
                            {!! Form::close() !!}
                            {!! Form::open(['method' => 'GET', 'url' => '/matriculas',  'role' => 'aluno']) !!}
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="search" placeholder="Buscar Aluno..">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn-primary btn-circle"><i class="material-icons">search</i> </button>

                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">picture_in_picture</i> Matriculas</h1>
                        </div>
                        <div class="body table-responsive">
                        @if($matriculas->count())
                                <table class="table table-bordered">
                                    <thead class="bg-blue-grey">
                                    <tr>
                                        <th>MATRICULA</th>
                                        <th>ALUNO</th>
                                        <th>TURMA</th>
                                        <th>AÇÃO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($matriculas as $matricula)
                                        <tr>
                                            <td>{{$matricula->id}}{{$matricula->turma->id}}</td>
                                            <td>{{$matricula->aluno->nome}}</td>
                                            <td>{{$matricula->turma->nome}}</td>
                                            <td>
                                                <a href="{{ route('matriculas.edit', $matricula->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                                <form action="{{ route('matriculas.destroy', $matricula->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                        @else
                            <h3 class="text-center alert alert-warning">Nenhuma Matricula Efetuada!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
