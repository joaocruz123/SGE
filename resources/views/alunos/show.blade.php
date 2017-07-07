@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="btn-group pull-right" role="group" aria-label="...">
                                    <a class="btn btn-warning btn-group" role="group" href="{{ route('alunos.edit', $aluno->id) }}"><i class="material-icons">edit</i> Editar</a>
                                    <button type="submit" class="btn btn-danger"><i class="material-icons">delete</i> Deletar </button>
                                </div>
                            </form>
                            <h1><i class="material-icons">person</i> {{$aluno->nome}}</h1>
                        </div>
                        <div class="body table-responsive">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="nome">CPF</label>
                                            <p class="form-control-static">{{$aluno->cpf}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="nome">Idade</label>
                                            <p class="form-control-static">{{$aluno->idade}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="nome">Sexo</label>
                                            <p class="form-control-static">{{$aluno->sexo}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="nome">Endereço</label>
                                            <p class="form-control-static">{{$aluno->endereco}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="nome">Telefone</label>
                                            <p class="form-control-static">{{$aluno->telefone}}</p>
                                        </div>
                                    </form>
                                    <a class="btn btn-link" href="{{ route('alunos.index') }}"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection