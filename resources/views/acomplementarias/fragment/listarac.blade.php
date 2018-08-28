@extends('layout')

@section('content')
@foreach($alumno as $al)
<h5>{{$al->nc}} <br> {{$al->paterno}} {{$al->materno}} {{$al->nombre}}</h5>
@endforeach
 
	 <table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th>Actividad</th>
				<th>N. Créditos</th>
				<th colspan="1">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@foreach($acomplementarias as $acomplementaria)
				<tr>
					<td>
						<strong>{{ $acomplementaria->actividad }}</strong>
					</td>
					<td>
						<strong>{{ $acomplementaria->creditos }}</strong>
					</td>
					<td width="20px">
						<a href="{{ route('acomplementarias.edit', $acomplementaria->id) }}" class="btn btn-raised btn-primary">
							Editar
						</a>
					</td> 
				</tr>
			@endforeach
		</tbody>
	</table>

	<br>
	<hr size="30">
	<br>
 	@if($ncreditos>=5)
 	<form action="../crear_constancia_ac/{{$al->nc}}" method="POST" target="_blank">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-6">
			<label for="oficio" class="control-label">No. de Oficio</label>
			<input type="text" id="oficio" name="oficio" class="form-control" value="001/2018">
		</div>
		<p class="col-md-12">
			<button type="submit" class="btn btn-raised btn-primary">Generar PDF</button>
			<a href="{{ route('acomplementarias.index') }}" class="btn btn-raised btn-primary">Regresar</a>
		</p>
	</form>
	@else
	<a href="{{ route('acomplementarias.index') }}" class="btn btn-raised btn-primary">Regresar</a>
	@endif

@endsection