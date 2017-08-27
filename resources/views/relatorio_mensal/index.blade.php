@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">trending_up</i> Relatório Mensal</h1>
                                {!! Form::open([
                                        'method'=>'GET',
                                        'url' => ['/imprimir/relatorio'],
                                        'style' => 'display:inline',
                                        ]) !!}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="col-xs-1 col-md-1 form-group">
                                            {!! Form::label('year','Ano',['class' => 'control-label']) !!}
                                            {!! Form::select('y', array_combine(range(date("Y"), 1900), range(date("Y"), 1900)), old('y', Request::get('y', date('Y'))), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-xs-2 col-md-2 form-group">
                                            {!! Form::label('month','Mês',['class' => 'control-label']) !!}
                                            {!! Form::select('m', cal_info(0)['months'], old('m', Request::get('m', date('m'))), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                {!! Form::button('<i class="material-icons" aria-hidden="true">print</i> Imprimir<span class="label label-default">'.'</span>', array(
                                            'type' => 'submit',
                                            'class' => 'btn bg-indigo waves-effect',
                                            'title' => 'Imprimir',
                                            'onclick'=>'return confirm("Deseja imprimir?")'
                                            )) !!}
                                {!! Form::close() !!}

                            {!! Form::open(['method' => 'get']) !!}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-xs-1 col-md-1 form-group">
                                        {!! Form::label('year','Ano',['class' => 'control-label']) !!}
                                        {!! Form::select('y', array_combine(range(date("Y"), 1900), range(date("Y"), 1900)), old('y', Request::get('y', date('Y'))), ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-xs-2 col-md-2 form-group">
                                        {!! Form::label('month','Mês',['class' => 'control-label']) !!}
                                        {!! Form::select('m', cal_info(0)['months'], old('m', Request::get('m', date('m'))), ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <label class="control-label">&nbsp;</label><br>
                                    {!! Form::submit('Selecionar Mês',['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h3>Relatório Mensal</h3>
                        </div>
                        <div class="body table-responsive">
                            <p align="center"> <h4>Relatório Total</h4></p>
                            <table class="table table-bordered">
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
                        <div class="body table-responsive">
                            <p align="center"> <h4>Relatório de Rendas</h4></p>
                            <table class="table table-bordered">
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
                        <div class="body table-responsive">
                            <p align="center"> <h4>Relatório de Despesas</h4></p>
                            <table class="table table-bordered">
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
    </section>



@stop