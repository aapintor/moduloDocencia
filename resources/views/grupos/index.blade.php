@extends('layout')

@section('content') 
	<div class="col-md-4">
		<a href="{{ route('grupos.create') }}" class="btn btn-raised btn-primary">Nuevo</a>
	</div>
	<form action="" method="GET" class="form-horizontal">
	<div class="col-md-6 form-group">
		<input type="text" id="busqueda" name="busqueda" style="text-transform:uppercase;" placeholder="Buscar..." class="form-control">
	</div>
	<div class="col-md-2">
		<button type="submit" class="btn btn-raised btn-primary"><i class="material-icons">search</i></button>
	</div>
	</form>
<br>
<br>
<br>
<h3>Grupos</h3>
	<table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th>Tutor</th>
				<th>Materia</th>
				<th>Ciclo Escolar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($grupos as $grupo)
				<tr>
					<td>{{ $grupo->alumno }}</td>
					<td>
						<strong>{{ $grupo->nombre }}</strong>
					</td>
					<td>
						<strong>{{ $grupo->periodo }} {{ $grupo->anio}}</strong>
					</td>
				</tr>
				<tr>
					<td colspan="3" align="center">
						<a href="listar_grupo/{{$grupo->alumno}}" data-target="grupo" class="btn btn-raised btn-primary">Detalles</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>


@endsection