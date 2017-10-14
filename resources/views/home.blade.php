@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Seja bem vindo ao Sistema de Gestão de Escola Bíblica <strong>{{ Auth::user()->name }}</strong>, use o menu lateral para acessar as opções do sistema!
            </div>
            <div class="block-header">
                <h2>Painel Principal</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">stars</i>
                        </div>
                        <div class="content">
                            <div class="text">TURMAS</div>
                            <div class="number">{{$totalTurmas}}</div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-cyan hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">USUÁRIOS</div>
                            <div class="number">{{$totalUsuarios}}</div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-light-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">school</i>
                        </div>
                        <div class="content">
                            <div class="text">ALUNOS</div>
                            <div class="number">{{$totalAlunos}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-orange hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">PROFESSORES</div>
                            <div class="number">{{$totalProfessor}}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h4><i class="material-icons">attach_money</i> Ultimos Ganhos</h4>
                                </div>
                                <div class="body table-responsive">
                                    @if($rendas->count())
                                        <table class="table table-hover dashboard-task-infos">
                                            <thead class="bg bg-cyan">
                                            <tr>
                                                <th>Categoria</th>
                                                <th>Valor</th>
                                                <th>Data</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rendas as $renda)
                                                <tr>
                                                    <td>{{$renda->categoria_renda->nome or ''}}</td>
                                                    <td>R$ {{$renda->valor}}</td>
                                                    <td><strong>{{$renda->created_at}}</strong></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                                @else
                                    <h3 class="text-center alert alert-warning">Nenhuma Renda Cadastrada!</h3>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h4><i class="material-icons">warning</i> Ultimas Despesas</h4>
                                </div>
                                <div class="body table-responsive">
                                    @if($despesas->count())
                                        <table class="table table-hover dashboard-task-infos">
                                            <thead class="bg bg-red">
                                            <tr>
                                                <th>Categoria</th>
                                                <th>Valor</th>
                                                <th>Data</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($despesas as $despesa)
                                                <tr>
                                                    <td>{{$despesa->categoria_despesa->nome or ''}}</td>
                                                    <td>R$ {{$despesa->valor}}</td>
                                                    <td><strong>{{$despesa->created_at}}</strong></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                                @else
                                    <h3 class="text-center alert alert-warning">Nenhuma Despesa Cadastrada!</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h4><i class="material-icons">trending_up</i> Estatísticas Financeiras</h4>
                                </div>
                                <div class="body">
                                    {!! $chart->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h4><i class="material-icons">record_voice_over</i> Ultimas Chamadas</h4>
                                </div>
                                <div class="body table-responsive">
                                    @if(count($chamadas)>0)
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Turma</th>
                                                    <th>Data da Chamada</th>
                                                    <th>Status</th>
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
                                                    </tr>
                                                @endforeach
                                                @else
                                                    <h3 class="text-center alert alert-info">Nenhuma Chamada Realizada!</h3>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
