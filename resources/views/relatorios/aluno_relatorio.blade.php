@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h4>Relatório Completo</h4>
                        </div>
                        <div class="body">
                            @if(count($studants)>0)
                                {!! Form::open(['method'=>'GET', 'url' => ['/imprimir/lista'],'style' => 'display:inline',]) !!}

                                {!! Form::button('<i class="material-icons">print</i> <br> Imprimir todos os alunos', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-block btn-lg bg-teal waves-effect',
                                            'title' => 'Imprimir',
                                            'onclick'=>'return confirm("Deseja imprimir?")'
                                            )) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h4>Relatório Customizavel</h4>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                {!! Form::open(['method' => 'GET', 'url' => ['/imprimir/aluno'],  'role' => 'search']) !!}
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="nome-field">Busca por Nome:</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="search" placeholder="Nome do Aluno" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <button type="submit" class="btn bg-teal waves-effect">
                                        <i class="material-icons">print</i>
                                    </button>
                                </div>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'GET', 'url' => ['/imprimir/aluno'],  'role' => 'search']) !!}
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="nome-field">Busca por Matricula:</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="search" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" maxlength="18" placeholder="000.000.000-00">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn bg-teal waves-effect">
                                        <i class="material-icons">print</i>
                                    </button>
                                </div>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'GET', 'url' => ['/imprimir/aluno'],  'role' => 'search']) !!}
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="nome-field">Busca por Data de Cadastro:</label>
                                        <div class="form-line">
                                            <input type="date" name="search" class="form-control" value="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn bg-teal waves-effect">
                                        <i class="material-icons">print</i>
                                    </button>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection