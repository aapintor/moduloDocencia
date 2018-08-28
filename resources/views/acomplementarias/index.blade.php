@extends('layout')

@section('content')
 
	<div class="col-md-4">
		<a href="{{ route('acomplementarias.create') }}" class="btn btn-raised btn-primary">Nuevo</a>
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
	<h3>Alumnos</h3>
	<table class="table table-striped table-hover ">
		<tbody>
			@foreach($alumnos as $alumno)
				<tr>
					<td colspan="3"><center>{{ $alumno->nc }}</center></td>
				</tr>
				<tr>
					<td>
						<strong>{{ $alumno->paterno }}</strong>
					</td>
					<td>
						<strong>{{ $alumno->materno }}</strong>
					</td>
					<td>
						<strong>{{ $alumno->nombre }}</strong>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<center><a href="listar_ac/{{$alumno->nc}}" data-target="ac" class="btn btn-raised btn-primary">Detalles</a></center>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $alumnos->render() !!}
</div>


@endsection