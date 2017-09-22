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
                                    <thead class="bg-blue-grey">
                                    <tr>
                                        <th>#</th>
                                        <th>NOME</th>
                                        <th>DATA DE CRIAÇÃO</th>
                                        <th>AÇÃO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($professors as $professor)
                                        <tr>
                                            <td>{{$professor->id}}</td>
                                            <td>{{$professor->nome}}</td>
                                            <td>{{date('d/m/Y', strtotime($professor->created_at))}}</td>
                                            <td>
                                                <a href="{{ route('professors.edit', $professor->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                                <button class="btn btn-primary btn-circle waves-effect" data-toggle="modal" data-target="#modal-{{ $professor->id }}"><i class="material-icons">visibility</i></button>
                                                <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-{{ $professor->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-blue">
                                                        <h1 id="ModalLabel">{{$professor->nome}}</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-sm-6">
                                                            <label>Endereço:</label>
                                                            <p>{{$professor->endereco}} anos</p>
                                                            <label>CPF:</label>
                                                            <p>{{$professor->cpf}}</p>
                                                            <label>Telefone:</label>
                                                            <p>{{$professor->telefone}}</p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Data de Cadastro:</label>
                                                            <p>{{date('d/m/Y', strtotime($professor->created_at))}}</p>
                                                            <label>Ultima atualização:</label>
                                                            <p>{{date('d/m/Y', strtotime($professor->updated_at))}}</p>
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
                                {!! $professors->render() !!}
                        </div>
                        @else
                            <h3 class="text-center alert alert-warning">Nenhum Professor!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
