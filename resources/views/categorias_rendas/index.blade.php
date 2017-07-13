@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('categorias_rendas.create') }}"><button type="button" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Nova Categoria</button></a>
                            <h1><i class="material-icons">add</i> Categorias de Rendas</h1>
                        </div>

                        <div class="body table-responsive">
            @if($categorias_rendas->count())
                                <table class="table table-bordered">
                                    <thead class="bg-blue-grey">
                        <tr>
                            <th>ID</th>
                            <th>CATEGORIA
                            <th>AÇÃO</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categorias_rendas as $categorias_renda)
                            <tr>
                                <td>{{$categorias_renda->id}}</td>
                                <td>{{$categorias_renda->nome}}</td>
                                <td>
                                    <a href="{{ route('categorias_rendas.edit', $categorias_renda->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                    <form action="{{ route('categorias_rendas.destroy', $categorias_renda->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $categorias_rendas->render() !!}
                        </div>
                        @else
                            <h3 class="text-center alert alert-info">Nenhuma Categoria!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection