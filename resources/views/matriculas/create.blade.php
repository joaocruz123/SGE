@extends('layouts.app')

@section('content')
    @include('error')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h1><i class="material-icons">add</i> Matricular</h1>
                                </div>
                                <div class="body table-responsive">
                                    {!! Form::open(array('route' => 'matriculas.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

                                    <div class="form-group">
                                        {!! Form::label('aluno_id', 'Aluno*', array('class'=>'col-sm-2 control-label')) !!}
                                        <div class="col-sm-10">
                                            {!! Form::select('aluno_id', $aluno, old('aluno_id'), array('class'=>'form-control')) !!}

                                        </div>
                                    </div><div class="form-group">
                                        {!! Form::label('turma_id', 'Turma*', array('class'=>'col-sm-2 control-label')) !!}
                                        <div class="col-sm-10">
                                            {!! Form::select('turma_id', $turma, old('turma_id'), array('class'=>'form-control')) !!}

                                        </div>
                                    </div>

                                    {!! Form::submit( 'Salvar' , array('class' => 'btn btn-primary')) !!}

                                    <a class="btn btn-link pull-right" href="{{ route('matriculas.index') }}"><i class="material-icons">arrow_back</i></a>


                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

