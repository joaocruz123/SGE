@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Professors / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('professors.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nome')) has-error @endif">
                       <label for="nome-field">Nome</label>
                    <input type="text" id="nome-field" name="nome" class="form-control" value="{{ old("nome") }}"/>
                       @if($errors->has("nome"))
                        <span class="help-block">{{ $errors->first("nome") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('endereco')) has-error @endif">
                       <label for="endereco-field">Endereco</label>
                    <input type="text" id="endereco-field" name="endereco" class="form-control" value="{{ old("endereco") }}"/>
                       @if($errors->has("endereco"))
                        <span class="help-block">{{ $errors->first("endereco") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('sexo')) has-error @endif">
                       <label for="sexo-field">Sexo</label>
                    <input type="text" id="sexo-field" name="sexo" class="form-control" value="{{ old("sexo") }}"/>
                       @if($errors->has("sexo"))
                        <span class="help-block">{{ $errors->first("sexo") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('idade')) has-error @endif">
                       <label for="idade-field">Idade</label>
                    <input type="text" id="idade-field" name="idade" class="form-control" value="{{ old("idade") }}"/>
                       @if($errors->has("idade"))
                        <span class="help-block">{{ $errors->first("idade") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('professors.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
