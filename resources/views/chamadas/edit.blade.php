@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Chamadas / Edit #{{$chamada->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('chamadas.update', $chamada->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('datachamada')) has-error @endif">
                       <label for="datachamada-field">Datachamada</label>
                    <input type="text" id="datachamada-field" name="datachamada" class="form-control" value="{{ is_null(old("datachamada")) ? $chamada->datachamada : old("datachamada") }}"/>
                       @if($errors->has("datachamada"))
                        <span class="help-block">{{ $errors->first("datachamada") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('realizada')) has-error @endif">
                       <label for="realizada-field">Realizada</label>
                    <input type="text" id="realizada-field" name="realizada" class="form-control" value="{{ is_null(old("realizada")) ? $chamada->realizada : old("realizada") }}"/>
                       @if($errors->has("realizada"))
                        <span class="help-block">{{ $errors->first("realizada") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('chamadas.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
