@extends('layouts.impressao')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de Alunos</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome completo</th>
                                    <th>Endereço</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alunos as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><strong>{{ $item->nome }}</strong></td>
                                        <td>{{$item->endereco }}</td>
                                        <td>{{ $item->cpf }}</td>
                                        <td>{{ $item->telefone }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection