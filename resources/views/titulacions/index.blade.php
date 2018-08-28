@extends('layout')

@section('content')
		<div class="col-md-4">
			<a href="{{ route('titulacions.create') }}" class="btn btn-raised btn-primary">Nuevo</a>
		</div>
		<form action="" method="GET" class="form-horizontal">
			<div class="col-md-6 form-group">
				<input type="text" id="busqueda" name="busqueda" style="text-transform:uppercase;" placeholder="Buscar..." class="form-control">
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-raised btn-primary"><i class="material-icons">search</i></button>
			</div>
		</form>

<div class="col-md-12">
	<h3>Titulaciones</h3>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Numero de Control</th>
				<th>Paterno</th>
				<th>Materno</th>
				<th>Nombre</th>
				<th colspan="1">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@foreach($alumnos as $alumno)
				<tr>
					<td>{{ $alumno->nc }}</td>
					<td>
						<strong>{{ $alumno->paterno }}</strong>
					</td>
					<td>
						<strong>{{ $alumno->materno }}</strong>
					</td>
					<td>
						<strong>{{ $alumno->nombre }}</strong>
					</td>
					<td>
						<a href="detalles_titu/{{$alumno->nc}}" data-target="titulacion" class="btn btn-raised btn-primary">Detalles</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $alumnos->render() !!}
</div>


@endsection 