@extends('layout')

@section('content')

	<div class="col-md-4">
		<a href="{{ route('lineainvs.create') }}" class="btn btn-raised btn-primary">Nuevo</a>
	</div>
	<form action="" method="GET" class="form-horizontal">
	<div class="col-md-6 form-group">
		<input type="text" id="s" name="s" style="text-transform:uppercase;" placeholder="Buscar..." class="form-control">
	</div>
	<div class="col-md-2">
		<button type="submit" class="btn btn-raised btn-primary"><i class="lineainvl-icons">search</i></button>
	</div>
	</form>

<div class="col-md-12">
<h4>Línea de generación de conocimiento</h4>
<table class="table table-striped table-hover ">
	<thead>
		<tr>
			<th>Nombre</th>
			<th colspan="1">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach($invs as $inv)
			<tr>
				<td>
					<strong>{{ $inv->nombre }}</strong>
				</td>
				<td width="20px">
					<a href="{{ route('lineainvs.edit', $inv->id) }}" class="btn btn-raised btn-primary">
						Editar
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection