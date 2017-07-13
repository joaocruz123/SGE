@extends('layout')
@section('header')
<div class="page-header">
        <h1>CategoriasRendas / Show #{{$categorias_renda->id}}</h1>
        <form action="{{ route('categorias_rendas.destroy', $categorias_renda->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('categorias_rendas.edit', $categorias_renda->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <p class="form-control-static">{{$categorias_renda->nome}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('categorias_rendas.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection