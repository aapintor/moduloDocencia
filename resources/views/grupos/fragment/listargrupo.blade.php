@extends('layout')

@section('content')
@foreach($alumno as $al)
<h5> <b>{{$al->nc}} — {{$al->paterno}} {{$al->materno}} {{$al->nombre}}</b>
<br>
@endforeach
@foreach($grupos as $grupo)
<i>{{$grupo->nombre}}</i></h5>
@endforeach

	<table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th>Dia</th>
				<th>Hora</th>
				<th>Salón</th>
			</tr>
		</thead>
		<tbody>
			@foreach($grupos as $grupo)
				<tr>
					<td>{{ $grupo->dia1 }}</td>
					<td>
						<strong>{{ $grupo->hora1 }}</strong>
					</td>
					<td>
						<strong>{{ $grupo->salon1}}</strong>
					</td>
					<td width="20px">
						<a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-raised btn-primary">
							Editar
						</a>
					</td>
				</tr>
				<tr>
					<td>{{ $grupo->dia2 }}</td>
					<td>
						<strong>{{ $grupo->hora2 }}</strong>
					</td>
					<td>
						<strong>{{ $grupo->salon2}}</strong>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<br>
	<hr size="30">
	<br>

	<form action="../crear_constancia_ce/{{ $grupo->alumno }}" method="POST" class="form" target="_blank">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-6 form-group">
			<label class="control-label" for="oficio">No. de Oficio</label>
			<input type="text" class="form-control" id="oficio" name="oficio" value="001/2018">
		</div>

		<p class="col-md-12 form-group">
			<button type="submit" class="btn btn-raised btn-primary">Generar PDF</button>
			<a href="{{ route('grupos.index') }}" class="btn btn-raised btn-primary">Regresar</a>
		</p>
	</form>
@endsection