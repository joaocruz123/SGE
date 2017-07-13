@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('categorias_despesas.create') }}"><button type="button" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Nova Categoria</button></a>
                            <h1><i class="material-icons">clear</i> Categorias de Despesas</h1>
                        </div>

                        <div class="body table-responsive">
            @if($categorias_despesas->count())
                                <table class="table table-bordered">
                                    <thead class="bg-blue-grey">
                        <tr>
                            <th>ID</th>
                            <th>CATEGORIA</th>
                            <th>AÇÃO</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categorias_despesas as $categorias_despesa)
                            <tr>
                                <td>{{$categorias_despesa->id}}</td>
                                <td>{{$categorias_despesa->nome}}</td>
                                <td>
                                    <a href="{{ route('categorias_despesas.edit', $categorias_despesa->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                    <form action="{{ route('categorias_despesas.destroy', $categorias_despesa->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $categorias_despesas->render() !!}
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