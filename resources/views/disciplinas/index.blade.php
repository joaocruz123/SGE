@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('disciplinas.create') }}"><button type="button" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Novo</button></a>
                            <h1><i class="material-icons">emoji_objects</i> Disciplinas</h1>
                        </div>
                        <div class="body table-responsive">
                            @if($disciplinas->count())
                                <table class="table table-bordered">
                                    <thead class="bg-blue-grey">
                                    <tr>
                                        <th>#</th>
                                        <th>NOME</th>
                                        <th>AREA DE CONHECIMENTO</th>
                                        <th>AÇÃO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($disciplinas as $disciplina)
                                        <tr>
                                            <td>{{ $disciplina->id }}</td>
                                            <td>{{ $disciplina->nome }}</td>
                                            <td>{{ $disciplina->area_conhecimento }}</td>
                                            <td>
                                                <a href="{{ route('disciplinas.edit', $disciplina->id) }}" title="Editar"><button class="btn btn-warning btn-xs waves-effect"><i class="material-icons">edit</i></button></a>
                                                <form action="{{ route('disciplinas.destroy', $disciplina->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-xs btn-danger waves-effect"><i class="material-icons">close</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $disciplinas->render() !!}
                        </div>
                        @else
                            <h3 class="text-center alert alert-warning">Nenhuma Disciplina!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
