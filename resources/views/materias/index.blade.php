@extends('layout')

@section('content')

	<div class="col-md-4">
		<a href="{{ route('materias.create') }}" class="btn btn-raised btn-primary">Nuevo</a>
	</div>
	<form action="" method="GET" class="form-horizontal">
	<div class="col-md-6 form-group">
		<input type="text" id="s" name="s" style="text-transform:uppercase;" placeholder="Buscar..." class="form-control">
	</div>
	<div class="col-md-2">
		<button type="submit" class="btn btn-raised btn-primary"><i class="material-icons">search</i></button>
	</div>
	</form>
<br>
<br>
<br>
<br>
<h3>Materias</h3> 
<table class="table table-striped table-hover ">
	<thead>
		<tr>
			<th>Nombre</th>
			<th colspan="1">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach($materias as $materia)
			<tr>
				<td>
					<strong>{{ $materia->nombre }}</strong>
				</td>
				<td width="20px">
					<a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-raised btn-primary">
						Editar
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection
