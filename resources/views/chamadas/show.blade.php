@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="pull-right">
                                <a href="{{ url('/chamadas/' . $chamada->id . '/edit') }}" title="Edit Chamada"><button class="btn btn-primary waves-effect"><i class="material-icons">edit</i>Editar</button></a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/chamadas', $chamada->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="material-icons">close</i> Excluir', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger',
                                        'title' => 'Delete Chamada',
                                        'onclick'=>'return confirm("Confirmar exclusão?")'
                                ))!!}
                                {!! Form::close() !!}
                            </div>
                            <h1><i class="material-icons">person</i> Frequencia {{ $chamada->turma->nome }}</h1>
                        </div>
                        <div class="body table-responsive">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th> Turma </th>
                                        <td> {{ $chamada->turma->nome }} </td>
                                    </tr>
                                    <tr>
                                        <th> Data chamada </th>
                                        <td> {{ $chamada->datachamada }} </td>
                                    </tr>
                                    <tr>
                                        <th> Visitantes </th>
                                        <td>{{ $chamada->visitantes}}</td>
                                    </tr>
                                    <tr>
                                        <th> Bíblias </th>
                                        <td>{{ $chamada->biblias}}</td>
                                    </tr>
                                    <tr>
                                        <th> Revistas </th>
                                        <td>{{ $chamada->revistas}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <caption><h4>Frequência dos Alunos</h4></caption>
                                    <tbody>
                                    @if(count($alunos)>0)
                                        <tr>
                                            <th>Aluno</th>
                                            <th>Idade</th>
                                            <th>Presença</th>
                                        </tr>
                                        @foreach($alunos as $aluno)
                                            <tr>
                                                <td>{{$aluno->nome}}</td>
                                                <td>{{$aluno->idade}}</td>
                                                <td>{!! getTotalFrequencia($aluno->id) !!}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">Nenhum Aluno na lista.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <a class="btn btn-link pull-right" href="{{ route('chamadas.index') }}"><i class="material-icons">arrow_back</i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection