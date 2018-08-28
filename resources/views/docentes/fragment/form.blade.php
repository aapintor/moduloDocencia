	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-6">
		<label for="nombre" class="control-label">Nombre</label>
		<input type="text" id="nombre" name="nombre" class="form-control" style="text-transform:uppercase;" >
	</div>
	<div class="col-md-6">
	<label for="paterno" class="control-label">Apellido Paterno</label>
		<input type="text" id="paterno" name="paterno" class="form-control" style="text-transform:uppercase;" >
	</div>

	<div class="col-md-6">
		<label for="materno" class="control-label">Apellido Materno</label>
		<input type="text" id="materno" name="materno" class="form-control" style="text-transform:uppercase;" >
	</div>

	<div class="col-md-12">
		<label for="rfc" class="control-label">RFC</label>
		<input type="text" id="rfc" name="rfc" class="form-control" style="text-transform:uppercase;" >
	</div>

	<div class="col-md-4">
		<label for="grado" class="control-label">Día</label>
		<select id="grado" name="grado" class="form-control">
			<option value="">Seleccione grado</option>
			<option value="M.C.">M.C</option>
			<option value="ING.">ING.</option>
			<option value="L.I">L.I.</option>
			<option value="DR.">DR.</option>
			<option value="M.I.">M.I.</option>
			<option value="I.S.C.">I.S.C.</option>
			<option value="M.A.">M.A.</option>
		</select>
	</div>

	<div class="col-md-8">
		<div class="form-group label-floating">
			<label for="desc" class="control-label">Descripción</label>
			<input type="text" id="desc" name="desc" class="form-control" style="text-transform:uppercase;" >
		</div>
	</div>

	<div class="col-md-8">
		<label for="email" class="control-label">Correo Electrónico</label>
		<input type="text" id="email" name="email" class="form-control">
	</div>

	<div class="col-md-4">
		<label for="sexo" class="control-label">Género</label><br>
		<input type="radio" id="sexo" name="sexo" value="M" > M<br>
  		<input type="radio" id="sexo" name="sexo" value="F"> F<br>
	</div>

	<div class="col-md-6">
		<label for="depto" class="control-label">Departamento</label>
		<select id="depto" name="depto" class="form-control">
			<option value="">Seleccione departamento</option>
			@foreach($depto as $dep)
			<option value="{!! $dep->id !!}">{!! $dep->nombre !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-4">
		<label for="inv" class="control-label">Línea de generación de con.</label>
		<select id="inv" name="inv" class="form-control">
			<option value="">Seleccione línea de generación de con.</option>
			@foreach($inv as $i)
			<option value="{!! $i->id !!}">{!! $i->nombre !!}</option>
			@endforeach
		</select>
	</div>
	<div class="col-md-12">
		<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
		<a href="{{ route('docentes.index') }}" class="btn btn-raised btn-primary">Cancelar</a>
	</div>