@extends('layout')

@section('content')
		<div >
		<div class="input-field col s8">
			<legend><strong> Editar Alumno</strong></legend>
		</div>
		<br>
		<br>
		<form action="{{ route('alumnos.update', $alumno->nc) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT')}}
			<div class="col-md-6">
				<label for="nombre" class="control-label">Nombre</label>
				<input type="text" id="nombre" name="nombre" class="form-control" style="text-transform:uppercase;" value="{{ old('nombre', $alumno->nombre) }}">
			</div>

			<div class="col-md-6">
				<label for="paterno" class="control-label">Apellido Paterno</label>
				<input type="text" id="paterno" name="paterno" class="form-control" style="text-transform:uppercase;" value="{{ old('paterno', $alumno->paterno) }}">
			</div>

			<div class="col-md-6">
				<label for="materno" class="control-label">Apellido Materno</label>
				<input type="text" id="materno" name="materno" class="form-control" style="text-transform:uppercase;" value="{{ old('materno', $alumno->materno) }}">
			</div>

			<div class="col-md-12">
				<label for="nc" class="control-label">Número de control</label>
				<input type="text" id="nc" name="nc" class="form-control" value="{{ old('nc', $alumno->nc) }}">
			</div>

			<div class="col-md-6">
				<label for="carrera" class="control-label">Carrera</label>
				<select id="carrera" name="carrera" class="form-control">
					<option value="">Seleccione carrera</option>
					@foreach($carrera as $c)
					<option value="{!! $c->id !!}" {{(old('carrera',$alumno->carrera)==$c->id)? 'selected':''}}>{!! $c->nombre !!}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-6">
				<label for="plan" class="control-label">Plan de estudios</label>
				<select id="plan" name="plan" class="form-control">
					<option value="">Seleccione plan de estudios</option>
					@foreach($plan as $p)
					<option value="{!! $p->id !!}" {{(old('plan',$alumno->plan)==$p->id)? 'selected':''}}>{!! $p->nombre !!}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-6">
				<label for="email" class="control-label">Correo electrónico</label>
				<input type="text" id="email" name="email" class="form-control" value="{{ old('email', $alumno->email) }}">
			</div>

			<div class="col-md-6">
				<label for="celular" class="control-label">Celular</label>
				<input type="text" id="celular" name="celular" class="form-control" value="{{ old('celular', $alumno->celular) }}">
			</div>

			<div class="col-md-5">
				<label for="calle" class="control-label">Calle</label>
				<input type="text" id="calle" name="calle" class="form-control" style="text-tracarreraform:uppercase;" value="{{ old('calle', $alumno->calle) }}">
			</div>

			<div class="col-md-5">
				<label for="colonia" class="control-label">Colonia</label>
				<input type="text" id="colonia" name="colonia" class="form-control" style="text-tracarreraform:uppercase;" value="{{ old('colonia', $alumno->colonia) }}">
			</div>

			<div class="col-md-2">
				<label for="num" class="control-label">Número</label>
				<input type="text" id="num" name="num" class="form-control" style="text-tracarreraform:uppercase;" value="{{ old('num', $alumno->num) }}">
			</div>

			<p class="col-md-12">
				<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
				<a href="{{ route('alumnos.index') }}" class="btn btn-raised btn-primary">Cancelar</a>
			</p>
			</div>
	</form>
@endsection