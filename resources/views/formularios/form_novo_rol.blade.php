@extends ('layouts.app')

@section('content')
	@can('admin')
	<section class="content" >
		@include('flash::message')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h3>Novo Papel</h3>
							</div>
							<div class="body">
								<form   action="{{ url('criar_rol') }}"  method="post" id="f_crear_rol" class="formentrada"  >
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

									<div class="col-sm-4">
										<div class="form-group">
											<label for="apellido">Nome do Papel*</label>
											<div class="form-group">
												<div class="form-line">
													<input type="text" class="form-control" id="rol_nombre" name="rol_nombre"  required >
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-4">
										<div class="form-group">
											<label for="apellido">Sigla*</label>
											<div class="form-group">
												<div class="form-line">
													<input type="text" class="form-control" id="rol_slug" name="rol_slug" required >
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-4">
										<div class="form-group">
											<label for="apellido">Descrição*</label>
											<div class="form-group">
												<div class="form-line">
													<input type="text" class="form-control" id="rol_descripcion" name="rol_descripcion" required >
												</div>
											</div>
										</div>
									</div>

									<button type="submit" class="btn btn-primary">Criar Novo Papel</button>

								</form>
							</div>
						</div>
							<div class="card">
								<div class="body table-responsive">
									<table  class="table table-hover table-striped" cellspacing="0" width="100%">
										<thead>
										<tr>
											<th>Código</th>
											<th>Nome</th>
											<th>Sigla</th>
											<th>Descrição</th>
											<th>Ação</th>
										</tr>
										</thead>
										<tbody>

										@foreach($roles as $rol)
											<tr role="row" class="odd" id="filaR_{{  $rol->id }}">
												<td>{{ $rol->id }}</td>
												<td><span class="label label-default">{{ $rol->name or "Ninguno" }}</span></td>
												<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);" style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $rol->slug  }}</a></td>
												<td>{{ $rol->description }}</td>
												<td>
													<button type="button"  class="btn  btn-danger btn-circle" onclick="borrar_rol({{ $rol->id }});"   ><i class="material-icons">close</i> </button>
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
			</div>
		</div>
	</section>
	@endcan
@endsection