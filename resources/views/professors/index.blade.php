@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('professors.create') }}"><button type="button" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Novo Professor</button></a>
                            <h1><i class="material-icons">school</i> Professores</h1>
                        </div>
                        <div class="body table-responsive">
                            @if($professors->count())
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOME</th>
                                        <th>ENDERECO</th>
                                        <th>AÇÃO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($professors as $professor)
                                        <tr>
                                            <td>{{$professor->id}}</td>
                                            <td>{{$professor->nome}}</td>
                                            <td>{{$professor->endereco}}</td>
                                            <td>
                                                <a href="{{ route('professors.edit', $professor->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                                <a href="{{ route('professors.show', $professor->id) }}" title="Visualizar"><button class="btn btn-primary btn-circle waves-effect"><i class="material-icons">visibility</i></button> </a>
                                                <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $professors->render() !!}
                        </div>
                        @else
                            <h3 class="text-center alert alert-info">Nenhum Professor!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
