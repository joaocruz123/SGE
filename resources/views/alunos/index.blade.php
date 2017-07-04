@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('alunos.create') }}"><button type="button" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Novo Aluno</button></a>
                            <h1><i class="material-icons">person</i> Alunos</h1>
                        </div>
                        <div class="body table-responsive">
                            @if($alunos->count())
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NOME</th>
                                        <th>MATRICULA</th>
                                        <th>DATA DE CADASTRO</th>
                                        <th>AÇÃO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alunos as $aluno)
                                        <tr>
                                            <td>{{$aluno->id}}</td>
                                            <td>{{$aluno->nome}}</td>
                                            <td>{{$aluno->matricula}}</td>
                                            <td>{{$aluno->created_at}}</td>
                                            <td>
                                                <a href="{{ route('alunos.edit', $aluno->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                                <a href="{{ route('alunos.show', $aluno->id) }}" title="Visualizar"><button class="btn btn-primary btn-circle waves-effect"><i class="material-icons">visibility</i></button> </a>
                                                <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $alunos->render() !!}
                        </div>
                        @else
                            <h3 class="text-center alert alert-info">Nenhum Aluno!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
