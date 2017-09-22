@extends('layouts.impressao')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <h3><p align="center"> Relatório Mensal Financeiro</p></h3>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p align="center"> <h4>Relatório Total</h4></p>
                    </div>
                    <div class="painel-body">
                        <div class="page-break" style="page-break-after: always;">
                        <table class="table table-striped">
                            <thead class="bg-light-green">
                            <th>Descrição</th>
                            <th>Valor</th>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Recitas</th>
                                <td>{{ number_format($inc_total, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Despesas</th>
                                <td>{{ number_format($exp_total, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Lucro</th>
                                <td>{{ number_format($profit, 2) }}</td>
                            </tr>

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p align="center"> <h4>Relatório de Rendas</h4></p>
                    </div>
                    <div class="painel-body">
                        <div class="page-break" style="page-break-after: always;">
                        <table class="table table-striped">
                            <thead class="bg-light-green">
                            <th>Descrição</th>
                            <th>Valor</th>
                            </thead>
                            <tbody>

                            @foreach($inc_summary as $inc)
                                <tr>
                                    <th>{{ $inc['nome'] }}</th>
                                    <td>{{ number_format($inc['valor'], 2) }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <th>Total de Receitas no Mês</th>
                                <td>{{ number_format($exp_total, 2) }}</td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p align="center"> <h4>Relatório de Despesas</h4></p>
                    </div>
                    <div class="painel-body">
                        <div class="page-break" style="page-break-after: always;">
                        <table class="table table-striped">
                            <thead class="bg-light-green">
                            <th>Descrição</th>
                            <th>Valor</th>
                            </thead>
                            <tbody>
                            @foreach($exp_summary as $inc)
                                <tr>
                                    <th>{{ $inc['nome'] }}</th>
                                    <td>{{ number_format($inc['valor'], 2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Total de Despesas no Mês</th>
                                <td>{{ number_format($exp_total, 2) }}</td>
                            </tr>
                            </tbody>
                        </table>
                            </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
@endsection