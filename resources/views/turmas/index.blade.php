@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('turmas.create') }}"><button type="button" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Nova Turma</button></a>
                            <h1><i class="material-icons">class</i> Turmas</h1>
                        </div>
                        <div class="body table-responsive">
                            @if($turmas->count())
                                <table class="table table-bordered">
                                    <thead class="bg-blue-grey">
                                    <tr>
                                        <th>#</th>
                                        <th>NOME</th>
                                        <th>AÇÃO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($turmas as $turma)
                                        <tr>
                                            <td>{{$turma->id}}</td>
                                            <td>{{$turma->nome}}</td>
                                            <td>
                                                <a href="{{ url('/turma_disciplina/' . $turma->id) }}" title="Adicionar Disciplinas"><button class="btn btn-primary btn-xs waves-effect"><i class="material-icons">note_add</i></button></a>
                                                <a href="{{ route('turmas.edit', $turma->id) }}" title="Editar"><button class="btn btn-warning btn-xs waves-effect"><i class="material-icons">edit</i></button></a>
                                                <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-xs btn-danger waves-effect"><i class="material-icons">close</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $turmas->render() !!}
                        </div>
                        @else
                            <h3 class="text-center alert alert-info">Nenhuma Turma!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
