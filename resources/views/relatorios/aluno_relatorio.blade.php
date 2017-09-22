@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h4>Relatório Completo</h4>
                        </div>
                        <div class="body">
                            @if(count($alunos)>0)
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
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h4>Relatório Customizavel</h4>
                        </div>
                        <div class="body">
                            {!! Form::open(['method' => 'GET', 'url' => ['/imprimir/aluno'],  'role' => 'search']) !!}
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nome-field">Busca por Nome:</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="search" placeholder="Nome do Aluno.">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nome-field">Busca por CPF:</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="search" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" maxlength="11" placeholder="000.000.000-00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nome-field">Busca por Data:</label>
                                    <div class="form-line">
                                        <input type="date" name="search" class="form-control" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-teal waves-effect btn-block"><i class="material-icons">print</i> Imprimir</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection