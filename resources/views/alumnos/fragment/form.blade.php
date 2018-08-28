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
		<label for="nc" class="control-label">Número de control</label>
		<input type="text" id="nc" name="nc" class="form-control" style="text-transform:uppercase;" >
	</div>

	<div class="col-md-6">
		<label for="carrera" class="control-label">Carrera</label>
		<select id="carrera" name="carrera" class="form-control">
			<option value="">Seleccione carrera</option>
			@foreach($carrera as $c)
			<option value="{!! $c->id !!}">{!! $c->nombre !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-6">
		<label for="plan" class="control-label">Plan de estudios</label>
		<select id="plan" name="plan" class="form-control">
			<option value="">Seleccione plan de estudios</option>
			@foreach($plan as $p)
			<option value="{!! $p->id !!}">{!! $p->nombre !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-6">
		<label for="email" class="control-label">Correo electrónico</label>
		<input type="text" id="email" name="email" class="form-control">
	</div>

	<div class="col-md-6">
		<label for="celular" class="control-label">Celular</label>
		<input type="text" id="celular" name="celular" class="form-control">
	</div>

	<div class="col-md-5">
		<label for="calle" class="control-label">Calle</label>
		<input type="text" id="calle" name="calle" class="form-control" style="text-transform:uppercase;">
	</div>

	<div class="col-md-5">
		<label for="colonia" class="control-label">Colonia</label>
		<input type="text" id="colonia" name="colonia" class="form-control" style="text-transform:uppercase;" >
	</div>

	<div class="col-md-2">
		<label for="num" class="control-label">Número</label>
		<input type="text" id="num" name="num" class="form-control" style="text-transform:uppercase;" >
	</div>

	<p class="col-md-12">
		<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
		<a href="{{ route('alumnos.index') }}" class="btn btn-raised btn-primary">Cancelar</a>
	</p>