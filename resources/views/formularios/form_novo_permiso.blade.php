@extends ('layouts.app')

@section('content')
	@can('admin')
		<section class="content">
			@include('flash::message')
			<div class="container-fluid">
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="card">
							<div class="header">
								<h3>Agregar Permissão</h3>
							</div>
							<div class="body">
									<form   action="{{ url('agregar_permiso') }}"  method="post" id="f_asignar_permiso" class="formentrada"  >
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
										<div class="col-sm-12">
									<div class="form-group">
										<label for="rol">Papel*</label>
										<select id="rol_sel" name="rol_sel" class="form-control" required>
											@foreach($roles as $rol)
												<option value="{{ $rol->id }}">{{ $rol->name }}</option>
											@endforeach
										</select>
									</div>
										</div>
										<div class="col-sm-12">
									<div class="form-group">
										<label for="rol">Permissão*</label>
										<select id="permiso_rol" name="permiso_rol" class="form-control" required>
											@foreach($permisos as $permiso)
												<option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
											@endforeach
										</select>
									</div>
										</div>
										<button type="submit" class="btn btn-primary">Agregar Permissão</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="card">
							<div class="header">
								<h3>Nova Permissão</h3>
							</div>
							<div class="body">
								<form   action="{{ url('criar_permiso') }}"  method="post" id="f_crear_permiso" class="formentrada"  >
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

									<div class="col-sm-12">
										<div class="form-group">
											<label for="apellido">Permissão*</label>
											<div class="form-group">
												<div class="form-line">
													<input type="text" class="form-control" id="permiso_nombre" name="permiso_nombre" required >
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="apellido">Sigla*</label>
											<div class="form-group">
												<div class="form-line">
													<input type="text" class="form-control" id="permiso_slug" name="permiso_slug" required >
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="apellido">Descrição*</label>
											<div class="form-group">
												<div class="form-line">
													<input type="text" class="form-control" id="permiso_descripcion" name="permiso_descripcion" required >
												</div>
											</div>
										</div>
									</div>

									<button type="submit" class="btn btn-primary">Criar Nova Permissão</button>

								</form>

							</div>

						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="body">
								@foreach($roles as $rol)

									<div class="table-responsive" >

										<table  class="table table-hover table-striped" cellspacing="0" width="100%">

											<thead>
											<th colspan="5" style="text-align: center; background-color: #b8ccde;" >Permissões do Usuario {{ $rol->name }}</th>
											</thead>
											<thead>
											<th>Código</th>
											<th>Nome</th>
											<th>Sigla</th>
											<th>Descrição</th>
											<th>Ação</th>

											</thead>
											<tbody>


											@foreach($rol->permissions as $permiso)


												<tr role="row" class="odd" id="filaP_{{ $permiso->id }}">
													<td>{{ $permiso->id }}</td>
													<td><span class="label label-default">{{ $permiso->name or "Ninguno" }}</span></td>
													<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);" style="display:block"></i>&nbsp;&nbsp;{{ $permiso->slug  }}</a></td>
													<td>{{ $permiso->description }}</td>
													<td>
														<button type="button"  class="btn  btn-danger btn-xs"  onclick="borrar_permiso({{ $rol->id }},{{ $permiso->id }});"  ><i class="fa fa-fw fa-remove"></i></button>
													</td>
												</tr>

											@endforeach
											</tbody>
										</table>

									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	@endcan
@endsection