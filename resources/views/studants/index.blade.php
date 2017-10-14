@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="pull-right">
                                <a href="{{ route('studants.create') }}"><button type="button" class="btn bg-green waves-effect "><i class="material-icons">add</i> Novo Aluno</button></a>
                            </div>
                            {!! Form::open(['method' => 'GET', 'url' => '/studants',  'role' => 'search']) !!}
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
                            @if($studants->count())
                                <table class="table table-bordered">
                                    <thead class="bg-blue-grey">
                                    <tr>
                                        <th>Matricula</th>
                                        <th>Nome</th>
                                        <th>Turma</th>
                                        <th>Data de Cadastro</th>
                                        <th>Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($studants as $studant)
                                        <tr>
                                            <td style="color: red">{{$studant->matricula}}</td>
                                            <td>{{$studant->nome}}</td>
                                            <td>{{$studant->turma->nome}}</td>
                                            <td>{{date('d/m/Y', strtotime($studant->created_at))}}</td>
                                            <td>
                                                <a href="{{ route('studants.edit', $studant->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                                <button class="btn btn-primary btn-circle waves-effect" data-toggle="modal" data-target="#modal-{{ $studant->id }}"><i class="material-icons">visibility</i></button>
                                                <form action="{{ route('studants.destroy', $studant->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal de Visualização -->
                                        <div class="modal fade" id="modal-{{ $studant->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-blue">
                                                        <h1 id="ModalLabel">{{$studant->nome}}</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-sm-12">
                                                            <div class="header">
                                                                <h4>Dados Pessoais</h4>
                                                            </div>
                                                            <div class="body">
                                                                <div class="col-sm-6">
                                                                    <label>CPF:</label>
                                                                    <p>{{$studant->cpf}}</p>

                                                                    <label>Telefone:</label>
                                                                    <p>{{$studant->telefone}}</p>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>Endereço:</label>
                                                                    <p>{{$studant->endereco}}</p>

                                                                    <label>Idade:</label>
                                                                    <p>{{$studant->idade}} anos</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="header">
                                                                <h4>Dados de Matricula</h4>
                                                            </div>
                                                            <div class="body">
                                                                <div class="col-sm-6">
                                                                    <label>Classe Matriculado(a):</label>
                                                                    <p>{{$studant->turma->nome}}</p>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>Número de Matricula:</label>
                                                                    <p>{{$studant->matricula}}</p>
                                                                </div>
                                                            </div>
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
                                {!! $studants->appends(['search'=>Request::get('search')])->render() !!}
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
