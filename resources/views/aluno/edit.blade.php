@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <a href="{{url('/aluno')}}"><h2><i class="material-icons">arrow_back</i> Voltar</h2></a>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><i class="material-icons">add</i> Edite os Dados do Aluno</h2>
                    </div>
                    <div class="body table-responsive">
                        <div class="col-sm-6">
                            <form action="/aluno/{{ $alunodetalhe->id }}" method="POST">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Nome:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <input type="text" name="nome" value="{{ $alunodetalhe->nome }}" placeholder="Nome">
                                    {{ ($errors->has('nome')) ? $errors->first('nome') : '' }}
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Idade:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <input type="text" name="idade" value="{{ $alunodetalhe->idade }}" placeholder="Idade">
                                    {{ ($errors->has('idade')) ? $errors->first('idade') : '' }}
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Sexo:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <input type="text" name="sexo" value="{{ $alunodetalhe->sexo }}" placeholder="Sexo">
                                    {{ ($errors->has('sexo')) ? $errors->first('sexo') : '' }}
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Endereço:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <input type="text" name="endereco" value="{{ $alunodetalhe->edereco }}" placeholder="Endereço">
                                    {{ ($errors->has('endereco')) ? $errors->first('Endereco') : '' }}
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Telefone:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <input type="text" name="telefone" value="{{ $alunodetalhe->telefone }}" placeholder="Telefone">
                                    {{ ($errors->has('telefone')) ? $errors->first('telefone') : '' }}
                                </div>
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" name="name" value="Salvar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
