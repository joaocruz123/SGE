@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="pull-right">
                            @if(count($alunos)>0)
                                {!! Form::open([
                                        'method'=>'GET',
                                        'url' => ['/imprimir/lista'],
                                        'style' => 'display:inline',
                                        ]) !!}

                                {!! Form::button('<i class="material-icons" aria-hidden="true">print</i> Imprimir todos os Alunos <span class="label label-default">'.'</span>', array(
                                            'type' => 'submit',
                                            'class' => 'btn bg-indigo waves-effect',
                                            'title' => 'Imprimir',
                                            'onclick'=>'return confirm("Deseja imprimir?")'
                                            )) !!}
                                {!! Form::close() !!}
                            @endif
                            <a href="{{ route('alunos.create') }}"><button type="button" class="btn bg-green waves-effect "><i class="material-icons">add</i> Novo Aluno</button></a>
                            </div>
                            {!! Form::open(['method' => 'GET', 'url' => '/alunos',  'role' => 'search']) !!}
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

                            <h1><i class="material-icons">person</i> Alunos</h1>
                        </div>
                        <div class="body table-responsive">
                            @if($alunos->count())
                                <table class="table table-bordered">
                                    <thead class="bg-blue-grey">
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Data de Cadastro</th>
                                        <th>Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alunos as $aluno)
                                        <tr>
                                            <td>{{$aluno->id}}</td>
                                            <td>{{$aluno->nome}}</td>
                                            <td>{{date('d/m/Y', strtotime($aluno->created_at))}}</td>
                                            <td>
                                                <a href="{{ route('alunos.edit', $aluno->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                                <button class="btn btn-primary btn-circle waves-effect" data-toggle="modal" data-target="#modal-{{ $aluno->id }}"><i class="material-icons">visibility</i></button>
                                                <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal de Visualização -->
                                        <div class="modal fade" id="modal-{{ $aluno->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-blue">
                                                        <h1 id="ModalLabel">{{$aluno->nome}}</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-sm-6">
                                                            <label>Idade:</label>
                                                            <p>{{$aluno->idade}} anos</p>
                                                            <label>CPF:</label>
                                                            <p>{{$aluno->cpf}}</p>
                                                            <label>Endereço:</label>
                                                            <p>{{$aluno->endereco}}</p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Data de Cadastro:</label>
                                                            <p>{{date('d/m/Y', strtotime($aluno->created_at))}}</p>
                                                            <label>Telefone:</label>
                                                            <p>{{$aluno->telefone}}</p>
                                                            <label>Ultima atualização:</label>
                                                            <p>{{date('d/m/Y', strtotime($aluno->updated_at))}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">FECHAR</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    </tbody>
                                </table>
                                {!! $alunos->appends(['search'=>Request::get('search')])->render() !!}
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
