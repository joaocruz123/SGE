@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('despesas.create') }}"><button type="button" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Nova Despesa</button></a>
                            <h1><i class="material-icons">remove</i> Despesas</h1>
                        </div>

                        <div class="body table-responsive">
                            @if($despesas->count())
                                <table class="table table-bordered">
                                    <thead class="bg-blue-grey">
                                    <tr>
                                        <th>#</th>
                                        <th>CATEGORIA</th>
                                        <th>VALOR</th>
                                        <th>AÇÃO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($despesas as $despesa)
                                        <tr>
                                            <td>{{$despesa->id}}</td>
                                            <td>{{$despesa->categoria_despesa->nome or ''}}</td>
                                            <td>R$ {{$despesa->valor}}</td>
                                            <td>
                                                <a href="{{ route('despesas.edit', $despesa->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                                <button type="button" title="Visualizar" class="btn btn-primary btn-circle waves-effect" data-toggle="modal" data-target="#modal-{{ $despesa->id }}"><i class="material-icons">visibility</i></button>

                                                <form action="{{ route('despesas.destroy', $despesa->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal de Visualização -->
                                        <div class="modal fade" id="modal-{{ $despesa->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-red">
                                                        <h4 class="modal-title" id="smallModalLabel">Detalhes da Despesa</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Categoria da Despesa:</label>
                                                        <p>{{$despesa->categoria_despesa->nome}}</p>
                                                        <label>Data da Despesa:</label>
                                                        <p>{{date('d/m/Y', strtotime($despesa->data))}}</p>
                                                        <label>Valor da Despesa:</label>
                                                        <p>R$ {{$despesa->valor}},00</p>
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
                        </div>
                        @else
                            <h3 class="text-center alert alert-info">Nenhuma Despesa!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
