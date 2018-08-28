@extends('layout')

@section('content')
	<div class="col-md-6">
		<a href="{{ route('docentes.create') }}" class="btn btn-raised btn-primary">Nuevo</a>
		<a href="{{ route('puestos.create') }}" class="btn btn-raised btn-primary">Asignar Puestos</a>
	</div>
	<form action="" method="GET" class="form-horizontal">
	<div class="col-md-4 form-group">
		<input type="text" id="busqueda" name="busqueda" style="text-transform:uppercase;" placeholder="Buscar..." class="form-control">
	</div>
	<div class="col-md-2">
		<button type="submit" class="btn btn-raised btn-primary"><i class="material-icons">search</i></button>
	</div>
	</form>
	<br>
	<br>
	<br>
	<br>
	<h3>Docentes</h3>
		<table class="table table-striped table-hover ">
			<thead>
				<tr>
					<th>RFC</th>
					<th>Paterno</th>
					<th>Materno</th>
					<th>Nombre</th>
					<th colspan="1">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($docentes as $docente)
					<tr>
						<td>{{ $docente->rfc }}</td>
						<td>
							<strong>{{ $docente->paterno }}</strong>
						</td>
						<td>
							<strong>{{ $docente->materno }}</strong>
						</td>
						<td>
							<strong>{{ $docente->nombre }}</strong>
						</td>
						<td width="20px">
							<a href="{{ route('docentes.edit', $docente->rfc) }}" class="btn btn-raised btn-primary">
								Editar
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		{!! $docentes->render() !!}

@endsection