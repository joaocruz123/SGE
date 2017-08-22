@extends('layout')
@section('header')
<div class="page-header">
        <h1>Cordenadors / Show #{{$cordenador->id}}</h1>
        <form action="{{ route('cordenadors.destroy', $cordenador->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('cordenadors.edit', $cordenador->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="nome">NOME</label>
                     <p class="form-control-static">{{$cordenador->nome}}</p>
                </div>
                    <div class="form-group">
                     <label for="idade">IDADE</label>
                     <p class="form-control-static">{{$cordenador->idade}}</p>
                </div>
                    <div class="form-group">
                     <label for="sexo">SEXO</label>
                     <p class="form-control-static">{{$cordenador->sexo}}</p>
                </div>
                    <div class="form-group">
                     <label for="endereco">ENDERECO</label>
                     <p class="form-control-static">{{$cordenador->endereco}}</p>
                </div>
                    <div class="form-group">
                     <label for="telefone">TELEFONE</label>
                     <p class="form-control-static">{{$cordenador->telefone}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('cordenadors.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection