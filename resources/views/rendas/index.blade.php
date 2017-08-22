@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('rendas.create') }}"><button type="button" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Nova Receita</button></a>
                            <h1><i class="material-icons">add_box</i> Rendas</h1>
                        </div>

                        <div class="body table-responsive">
                                @if($rendas->count())
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
                                    @foreach($rendas as $renda)
                                        <tr>
                                            <td>{{$renda->id}}</td>
                                            <td>{{$renda->categoria_renda->nome or ''}}</td>
                                            <td>R$ {{$renda->valor}}</td>
                                            <td>
                                                <a href="{{ route('rendas.edit', $renda->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                                <button type="button" title="Visualizar" class="btn btn-primary btn-circle waves-effect" data-toggle="modal" data-target="#modal-{{ $renda->id }}"><i class="material-icons">visibility</i></button>

                                                <form action="{{ route('rendas.destroy', $renda->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal de Visualização -->
                                        <div class="modal fade" id="modal-{{ $renda->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-green">
                                                        <h4 class="modal-title" id="smallModalLabel">Detalhes da Renda</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Categoria da Renda:</label>
                                                        <p>{{$renda->categoria_renda->nome}}</p>
                                                        <label>Data da Renda:</label>
                                                        <p>{{date('d/m/Y', strtotime($renda->data))}}</p>
                                                        <label>Valor da Renda:</label>
                                                        <p>R$ {{$renda->valor}}</p>
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
                            <h3 class="text-center alert alert-info">Nenhuma Receita!</h3>
                        @endif
                        </div>
                    </div>
                </div>
            </div>

    </section>
@endsection
