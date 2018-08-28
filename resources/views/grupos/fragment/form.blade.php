	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-4 form-group">
		<label for="alumno" class="control-label">Alumno</label>
		<select id="alumno" name="alumno" class="form-control">
			<option value="alumno">Seleccione Alumno</option>
			@foreach($alumno as $alu)
			<option value="{!! $alu->nc !!}">{!! $alu->completo !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-4 form-group">
		<label for="materia" class="control-label">Materia</label>
		<select id="materia" name="materia" class="form-control">
			<option value="materia">Seleccione Materia</option>
			@foreach($materia as $mat)
			<option value="{!! $mat->id !!}">{!! $mat->nombre !!}</option>
			@endforeach
			
		</select>
	</div>

	<div class="col-md-4 form-group">
		<label for="ciclo" class="control-label">Ciclo Escolar</label>
		<select id="ciclo" name="ciclo" class="form-control">
			<option value="ciclo">Seleccione Ciclo</option>
			@foreach($cicloesc as $ci)
			<option value="{!! $ci->id !!}">{!! $ci->ciclo !!}</option>
			@endforeach
		</select>
		
	</div>

	<div class="col-md-4 form-group">
		<label for="dia1" class="control-label">Día</label>
		<select id="dia1" name="dia1" class="form-control">
			<option value="">Seleccione día</option>
			<option value="L">Lunes</option>
			<option value="M">Martes</option>
			<option value="X">Miércoles</option>
			<option value="J">Jueves</option>
			<option value="V">Viernes</option>
		</select>
	</div>

	<div class="col-md-4 form-group">
		<label for="hora1" class="control-label">Hora</label>
		<input type="text" id="hora1" name="hora1" class="form-control">
	</div>

	<div class="col-md-4 form-group">
		<label for="salon1" class="control-label">Salón</label>
		<input type="text" id="salon1" name="salon1" class="form-control" style="text-transform:uppercase;" >
	</div>

	<div class="col-md-4 form-group">
		<label for="dia2" class="control-label">Día</label>
		<select id="" name="dia2" class="form-control">
			<option value="dia2">Seleccione día</option>
			<option value="L">Lunes</option>
			<option value="M">Martes</option>
			<option value="X">Miércoles</option>
			<option value="J">Jueves</option>
			<option value="V">Viernes</option>
		</select>
	</div>

	<div class="col-md-4 form-group">
		<label class="control-label" for="hora2">Hora</label>
		<input type="text" class="form-control" id="hora2" name="hora2">
	</div>

	<div class="col-md-4 form-group">
		<label for="salon2" class="control-label">Salón</label>
		<input type="text" id="salon2" name="salon2" class="form-control">
	</div>

	<p class="col-md-12 form-group">
		<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
		<a href="{{ route('grupos.index') }}" class="btn btn-raised btn-primary">Cancelar</a>
	</p>