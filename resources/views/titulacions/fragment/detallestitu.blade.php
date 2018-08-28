@extends('layout')

@section('content')
@foreach($alumno as $al)
<center>
<div class="col-md-12">
<h3> <b>{{$al->nc}} — {{$al->paterno}} {{$al->materno}} {{$al->nombre}}</b></h3>
</div>
</center>
@endforeach
@foreach($titulacion as $titu)
<hr>
<center><h5><i>{{$titu->opcion}}</i></h5></center>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th><center>Asesor</center></th>
				<th colspan="3"> <center>Sinodales</center></th>
				<th colspan="1"></th>
			</tr>
		</thead>
		<tbody>
			
				<tr>
					<td>{{ $titu->asesor }}</td> 
					
					<td>
						{{ $titu->sinodal1 }}
					</td>
					
					<td>
						{{ $titu->sinodal2 }}
					</td>
					
					<td>
						{{ $titu->sinodal3 }}
					</td>
					<td>
						<a href="{{ route('titulacions.edit', $titu->id) }}" class="btn btn-raised btn-primary"><i class="material-icons">create</i></a>
					</td>
				</tr>
		</tbody>
	</table>
	<br>
@endforeach
	<a href="{{ route('titulacions.index') }}" class="btn btn-raised btn-primary">Regresar</a>
@endsection