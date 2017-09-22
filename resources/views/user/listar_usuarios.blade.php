@extends('layouts.app')

@section('content')
	@can('admin')
	<section class="content">
		<div class="container-fluid">
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					@include('flash::message')
					<div class="card">
						<div class="body">
							<div class="pull-right">
							<div class="col-sm-6">
								<a href="{{ url("/form_novo_usuario") }}" class="btn btn-primary waves-effect" ><i class="material-icons">add</i> Adicionar novo</a>
							</div>
							</div>
							{!! Form::open(['method' => 'POST', 'url' => 'buscar_usuario']) !!}
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" id="dato_buscado" placeholder="Buscar usuário" name="dato_buscado" required>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-circle waves-effect"><i class="material-icons">search</i></button>
							{!! Form::close() !!}
						</div>
					</div>
					<div class="card">
						<div class="header">
							<h3><i class="material-icons">person</i> Usuarios</h3>

						</div>
						<div class="body">
							@if(count($usuarios)>0)
							<div class="table-responsive" >

								<table  class="table table-striped">
									<thead>
									<tr>
										<th>Código</th>
										<th>Funções</th>
										<th>Nomes</th>
										<th>Email</th>
										<th>Ação</th>
									</tr>
									</thead>
									<tbody>
									@foreach($usuarios as $usuario)
										<tr role="row" class="odd">
											<td>{{ $usuario->id }}</td>
											<td><span class="label label-default">
													@foreach($usuario->getRoles() as $roles)
														{{  $roles.","  }}
													@endforeach

													-</span>
											</td>
											<td class="mailbox-messages mailbox-name"><strong>&nbsp{{ $usuario->name  }}</strong></td>
											<td>{{ $usuario->email }}</td>
											<td>
												<a href="{{ url('/form_editar_usuario/'.$usuario->id) }}" title="Editar"><button class="btn btn-warning btn-circle waves-effect"><i class="material-icons">edit</i></button></a>
												<form action="{!! url('/apagar_usuario') !!}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
													<input type="hidden" name="_method" value="DELETE">
													<input type="hidden" name="id_usuario" value="{{ $usuario->id }}">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<button type="submit" class="btn btn-danger btn-circle waves-effect"><i class="material-icons">close</i></button>
												</form>
											</td>
										</tr>
									@endforeach



									</tbody>
								</table>
								{{ $usuarios->links() }}
							</div>
							@else
							<h3>Nenhum Usuario Cadastrado!</h3>
						</div>

					</div>
					@endif
				</div>
			</div>
		</div>
	</section>
	@endcan
@endsection