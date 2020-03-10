@extends('layouts.impressao')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Lista de Alunos</h4>
                    </div>
                    <div class="panel-body">
                        <div class="page-break" style="page-break-after: always;">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nome completo</th>
                                    <th>Endereço</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Classe</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($studants as $item)
                                    <tr>
                                        <td><strong>{{ $item->nome }}</strong></td>
                                        <td style="color: red">{{$item->matricula }}</td>
                                        <td>{{ $item->cpf }}</td>
                                        <td>{{ $item->telefone }}</td>
                                        <td style="color: green">{{$item->turma->nome}}</td>
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