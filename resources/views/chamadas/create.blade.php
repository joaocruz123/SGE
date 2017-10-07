@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h1><i class="material-icons">person</i> Criar nova Frequencia</h1>
                        </div>
                        <div class="body">
                            <a href="{{ url('/chamadas') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                            <br />
                            <br />

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <form action="{{ route('chamadas.store') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include ('chamadas.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection