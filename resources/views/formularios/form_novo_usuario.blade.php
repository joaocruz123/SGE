@extends ('layouts.app')

@section('content')
    @can('admin')
    <section class="content">
        @include('flash::message')
        <div class="container-fluid">
            <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="card">
                                <div class="header">
                                    <h3><i class="material-icons">add</i> Novo Usuário</h3>
                                </div>
                                <div class="body">
                                    <form action="{{ url('criar_usuario') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <p class="lead">
                                            Dados Pessoais
                                        </p>

                                        <div class="col-sm-4">

                                        <div class="form-group">
                                            <label for="nome-field">Nome*:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="nombres" name="nombres"  required   >
                                                </div>
                                            </div>
                                        </div>

                                        </div>
                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="apellido">Sobrenome*:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="apellidos" name="apellidos" required >
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="celular">Telefone*:</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" maxlength="11" placeholder="(00) 0000-0000" class="form-control" id="telefono" name="telefono" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" required >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="lead">
                                            Dados de Acesso
                                        </p>

                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">E-mail*:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" placeholder="usuario@usuario.com" id="email" name="email"  required >
                                                </div>
                                            </div>
                                        </div>
                                        </div>



                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password">Senha:</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="password" name="password"  required >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Adicionar Usuário</button>

                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

    @endcan
@endsection