@extends('layout')

@section('content')
	<div >
		<div class="col-md-8">
			<legend><strong> Editar Actividad Complementaria</strong></legend>
		</div>
		<br>
		<br>
		<form action="{{ route('acomplementarias.update', $acomplementaria->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT')}}
			<div class="col-md-6">
				<label for="actividad" class="control-label">Nombre de la Actividad</label>
				<input type="text" id="actividad" name="actividad" class="form-control" style="text-transform:uppercase;" value="{{ old('actividad', $acomplementaria->actividad) }}">
			</div>

			<div class="col-md-6">
				<label for="alumno" class="control-label">Alumno</label>
				<select id="alumno" name="alumno" class="form-control">
					<option value="alumno">Seleccione Alumno</option>
					@foreach($alumno as $alu)
					<option value="{!! $alu->nc !!}" {{(old('alumno',$acomplementaria->alumno)==$alu->nc)? 'selected':''}}>{!! $alu->completo !!}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-4">
				<label for="creditos" class="control-label">Número de créditos</label>
				<input type="number" id="creditos" name="creditos" max="2" class="form-control" value="{{ old('creditos', $acomplementaria->creditos) }}">
			</div>

			<div class="col-md-4">
				<label for="fecha_del" class="control-label">Del</label>
				<input type="text" id="fecha_del" name="fecha_del" class="form-control" style="text-transform:uppercase;" value="{{ old('fecha_del', $acomplementaria->fecha_del) }}">
			</div>

			<div class="col-md-4">
				<label for="fecha_al" class="control-label">Al</label>
				<input type="text" id="fecha_al" name="fecha_al" class="form-control" style="text-transform:uppercase;" value="{{ old('fecha_al', $acomplementaria->fecha_al) }}">
			</div>

			<div class="col-md-3">
				<label for="horas" class="control-label">Horas</label>
				<input type="text" id="horas" name="horas" class="form-control" value="0" style="text-transform:uppercase;" value="{{ old('horas', $acomplementaria->horas) }}">
			</div>

			<div class="col-md-3">
				<label for="calificacion" class="control-label">Calificación</label>
				<input type="text" id="calificacion" name="calificacion" class="form-control" style="text-transform:uppercase;" value="{{ old('calificacion', $acomplementaria->calificacion) }}">
			</div>

			<div class="col-md-6">
				<label for="docente_resp" class="control-label">Docente Responsable</label>
				<select id="docente_resp" name="docente_resp" class="form-control">
					<option value="">Seleccione docente</option>
					@foreach($docente as $doc)
					<option value="{!! $doc->rfc !!}" {{(old('docente_resp',$acomplementaria->docente_resp)==$doc->rfc)? 'selected':''}}>{!! $doc->completo !!}</option>
					@endforeach
				</select>
			</div>

			<p class="col-md-12">
				<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
				<a href="{{ route('acomplementarias.index') }}" class="btn btn-raised btn-primary">Cancelar</a>
			</p>

		</form>
	</div>
@endsection