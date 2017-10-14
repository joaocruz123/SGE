@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('chamadas.create') }}"><button type="button" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Criar novo</button></a>

                            <h1><i class="material-icons">record_voice_over</i> Frequência</h1>
                        </div>
                        <div class="body table-responsive">
                            @if(count($chamadas)>0)
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead class="bg-blue-grey">
                                    <tr>
                                        <th>Turma</th>
                                        <th>Data da Chamada</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($chamadas as $chamada)
                                            <tr>
                                                <td>{{ $chamada->turma->nome }}</td>
                                                <td><p>{{date('d/m/Y', strtotime($chamada->datachamada))}}</p></td>
                                                @if($chamada->realizada == 1)
                                                    <td>{!! getStatusChamada($chamada->realizada) !!}</td>
                                                @else
                                                    <td>{!! getStatusChamada($chamada->realizada) !!}</td>
                                                @endif
                                                <td>

                                                    @if($chamada->realizada == 1)
                                                        <a href="{{ url('/chamadas/' . $chamada->id) }}" title="Visualizar Chamada"><button class="btn btn-info btn-circle waves-effect"><i class="material-icons">visibility</i></button></a>
                                                    @else
                                                        <a href="{{ url('/chamadas/frequencia/' . $chamada->id) }}" title="Realizar Chamada"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">content_paste</i></button></a>
                                                    @endif
                                                    <a href="{{ url('/chamadas/' . $chamada->id . '/edit') }}" title="Edit Chamada"><button class="btn btn-primary btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                                    <form action="{{ route('chamadas.destroy', $chamada->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {!! $chamadas->appends(['search'=>Request::get('search')])->render() !!}
                            </div>
                            @else
                                <h3 class="text-center alert alert-info">Nenhuma Chamada Realizada!</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
