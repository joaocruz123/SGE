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
                                    <h1><i class="material-icons">add</i> Adicione uma Receita</h1>
                                </div>
                                <div class="body table-responsive">
                                    <form action="{{ route('rendas.store') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                @if( count($categorias_rendas)<1 )
                                                    <br>
                                                    <h5 class="red-text">
                                                        Nenhuma Categoria Encontrada!
                                                    </h5>
                                                    <br>
                                                @else
                                                    <label for="categoria">Categoria: </label>
                                                    <select class="form-control show-tick" name="categoria_renda_id" id="categoria_renda_id" required>
                                                        @foreach($categorias_rendas as $categorias_renda)
                                                            <option value="{{$categorias_renda->id}}">{{$categorias_renda->nome}}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group @if($errors->has('data')) has-error @endif">
                                                <label for="nome-field">Data:</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="date" id="data-field" name="data" value="{{ old("data") }}"class="datepicker form-control">
                                                        @if($errors->has("data"))
                                                            <span class="help-block">{{ $errors->first("data") }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group @if($errors->has('valor')) has-error @endif">
                                                <label for="nome-field">Valor:</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="valor" id="valor-field" name="valor" value="{{ old("valor") }}"class="datepicker form-control">
                                                        @if($errors->has("valor"))
                                                            <span class="help-block">{{ $errors->first("valor") }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <button type="submit" class="btn btn-primary">Criar</button>
                                            <a class="btn btn-link pull-right" href="{{ route('rendas.index') }}"><i class="material-icons">arrow_back</i></a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
