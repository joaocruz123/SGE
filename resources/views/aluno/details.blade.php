@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>{{ $aluno->nome }}</h2></div>
                    <div class="panel-body">

                        <div>
                            <p>Idade: {{ $aluno->idade }}</p>
                            <p>Sexo: {{ $aluno->sexo }}</p>
                            <p>Endereço: {{ $aluno->endereco }}</p>
                            <p>Telefone: {{ $aluno->telefone }}</p>
                        </div>
                        <a href="/aluno">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
@endsection
