@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">person</i> Frequencia {{ $chamada->turma->nome }}</h1>
                        </div>
                        <div class="body table-responsive">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $chamada->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Data chamada </th>
                                        <td> {{ $chamada->datachamada }} </td>
                                    </tr>
                                    <tr>
                                        <th> Turma </th>
                                        <td> {{ $chamada->turma->nome }} </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <caption><h4>Lista de Alunos</h4></caption>
                                    <tbody>
                                    @if(count($alunos)>0)
                                        {!! Form::open([
                                            'method'=>'PUT',
                                            'url' => ['/fazer_chamada/chamada', $chamada->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        <tr>
                                            <th>Cód.</th>
                                            <th>Aluno</th>
                                            <th>Presença</th>
                                        </tr>
                                        @foreach($alunos as $aluno)
                                            <tr>
                                                <td>{{$aluno->id}}</td>
                                                <td>{{$aluno->nome}}</td>
                                                <input type="hidden" name="turma_id[]" value="{{$chamada->turma->id}}">
                                                <input type="hidden" name="aluno_id[]" value="{{$aluno->id}}">
                                                <td>
                                                   <input type="checkbox" name="presenca[{{$aluno->id}}][]" {{ studantIsChecked($presencas, $aluno->id)}} id="{{$aluno->id}}"/>
                                                    <label for="{{$aluno->id}}"> Presente</label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">Nenhum Aluno na lista.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> <strong>Salvar presença</strong>', array(
                                                             'type' => 'submit',
                                                             'class' => 'btn btn-info btn',
                                                             'title' => 'Confirmar lista de presença',
                                                             'style' => 'float: left',
                                                             'onclick'=>'return confirm("Confirmar listagem?")'
                                                     ))!!}
                                <a class="btn btn-link pull-right" href="{{ route('chamadas.index') }}"><i class="material-icons">arrow_back</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection