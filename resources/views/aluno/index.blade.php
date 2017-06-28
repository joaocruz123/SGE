
@extends('.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            {{Session::get('message')}}

            <div class="block-header">
                <a href="aluno/create"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">person_add</i> Novo Aluno</button></a>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                <div class="header">
                    <h2><i class="material-icons">school</i> Alunos</h2>
                </div>
                <div class="body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NOME</th>
                            <th>IDADE</th>
                            <th>AÇÃO</th>
                            <th>DELETAR</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alunos as $aluno)
                            <tr>
                                <td>{{$aluno->id}}</td>
                                <td><a href="/aluno/{{$aluno->id}}">{{$aluno->nome}}</a></td>
                                <td>{{$aluno->idade}}</td>
                                <td>
                                    <a href="/aluno/{{$aluno->id}}/edit" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
                                    <a href="/aluno/{{$aluno->id}}/" title="Visualizar"><button class="btn btn-primary btn-circle waves-effect"><i class="material-icons">visibility</i></button> </a>
                                </td>
                                <td>
                                    <div class="form-line">
                                    <form action="/aluno/{{$aluno->id}}" method="POST">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input class="btn btn-danger waves-effect" type="submit" name="name" value="APAGAR">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                </div>
            </div>
        </div>
    </section>
@endsection
