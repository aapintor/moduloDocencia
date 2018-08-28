	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-6">
		<label for="actividad" class="control-label">Nombre de la Actividad</label>
		<input type="text" id="actividad" name="actividad" class="form-control" style="text-transform:uppercase;" >
	</div>

	<div class="col-md-6">
		<label for="alumno" class="control-label">Alumno</label>
		<select id="alumno" name="alumno" class="form-control">
			<option value="alumno">Seleccione Alumno</option>
			@foreach($alumno as $alu)
			<option value="{!! $alu->nc !!}">{!! $alu->completo !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-4">
		<label for="creditos" class="control-label">Número de créditos</label>
		<input type="number" id="creditos" name="creditos" max="2" class="form-control">
	</div>

	<div class="col-md-4">
		<label for="fecha_del" class="control-label">Del</label>
		<input type="text" id="fecha_del" name="fecha_del" class="form-control" style="text-transform:uppercase;" >
	</div>

	<div class="col-md-4">
		<label for="fecha_al" class="control-label">Al</label>
		<input type="text" id="fecha_al" name="fecha_al" class="form-control" style="text-transform:uppercase;" >
	</div>

	<div class="col-md-3">
		<label for="horas" class="control-label">Horas</label>
		<input type="text" id="horas" name="horas" class="form-control" value="0" style="text-transform:uppercase;" >
	</div>

	<div class="col-md-3">
		<label for="calificacion" class="control-label">Calificación</label>
		<input type="text" id="calificacion" name="calificacion" class="form-control" style="text-transform:uppercase;">
	</div>

	<div class="col-md-6">
		<label for="docente_resp" class="control-label">docente_resp</label>
		<select id="docente_resp" name="docente_resp" class="form-control">
			<option value="">Seleccione docente</option>
			@foreach($docente as $doc)
			<option value="{!! $doc->rfc !!}">{!! $doc->completo !!}</option>
			@endforeach
		</select>
	</div>

	<p class="col-md-12">
		<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
		<a href="{{ route('acomplementarias.index') }}" class="btn btn-raised btn-primary">Cancelar</a>
	</p>
