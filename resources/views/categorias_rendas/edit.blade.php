@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('error')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="material-icons">mode_edit</i> Editar Categoria #{{$categorias_renda->id}}</h1>
                        </div>
                        <div class="body table-responsive">

            <form action="{{ route('categorias_rendas.update', $categorias_renda->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nome')) has-error @endif">
                       <label for="nome-field">Nome</label>
                    <input type="text" id="nome-field" name="nome" class="form-control" value="{{ is_null(old("nome")) ? $categorias_renda->nome : old("nome") }}"/>
                       @if($errors->has("nome"))
                        <span class="help-block">{{ $errors->first("nome") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('categorias_rendas.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
