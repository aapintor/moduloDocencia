@extends('layout')

@section('content')
	<div >
		<div class="input-field col s8">
			<legend><strong> Editar docente</strong></legend>
		</div>
		<br>
		<br>
		<form action="{{ route('docentes.update', $docente->rfc) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT')}}
			<div class="col-md-6">
				<label for="nombre" class="control-label">Nombre</label>
				<input type="text" id="nombre" name="nombre" class="form-control" style="text-transform:uppercase;" value="{{ old('nombre', $docente->nombre) }}">
			</div>
			<div class="col-md-6">
			<label for="paterno" class="control-label">Apellido Paterno</label>
				<input type="text" id="paterno" name="paterno" class="form-control" style="text-transform:uppercase;" value="{{ old('paterno', $docente->paterno) }}">
			</div>

			<div class="col-md-6">
				<label for="materno" class="control-label">Apellido Materno</label>
				<input type="text" id="materno" name="materno" class="form-control" style="text-transform:uppercase;" value="{{ old('materno', $docente->materno) }}">
			</div>

			<div class="col-md-12">
				<label for="rfc" class="control-label">RFC</label>
				<input type="text" id="rfc" name="rfc" class="form-control" style="text-transform:uppercase;" value="{{ old('rfc', $docente->rfc) }}">
			</div>

			<div class="col-md-4">
				<label for="grado" class="control-label">Día</label>
				<select id="grado" name="grado" class="form-control">
					<option value="">Seleccione grado</option>
					<option value="M.C." {!! (old('grado',$docente->grado)=='M.C.')? 'selected':'' !!}>M.C</option>
					<option value="ING." {!! (old('grado',$docente->grado)=='ING.')? 'selected':'' !!}>ING.</option>
					<option value="L.I" {!! (old('grado',$docente->grado)=='L.I.')? 'selected':'' !!}>L.I.</option>
					<option value="DR." {!! (old('grado',$docente->grado)=='DR.')? 'selected':'' !!}>DR.</option>
					<option value="M.I." {!! (old('grado',$docente->grado)=='M.I.')? 'selected':'' !!}>M.I.</option>
					<option value="I.S.C." {!! (old('grado',$docente->grado)=='I.S.C.')? 'selected':'' !!}>I.S.C.</option>
					<option value="M.A." {!! (old('grado',$docente->grado)=='M.A.')? 'selected':'' !!}>M.A.</option>
				</select>
			</div>

			<div class="col-md-8">
				<div class="form-group label-floating">
					<label for="desc" class="control-label">Descripción</label>
					<input type="text" id="desc" name="desc" class="form-control" style="text-transform:uppercase;" value="{{ old('desc', $docente->desc) }}">
				</div>
			</div>

			<div class="col-md-8">
				<label for="email" class="control-label">Correo Electrónico</label>
				<input type="text" id="email" name="email" class="form-control" value="{{ old('email', $docente->email) }}">
			</div>

			<div class="col-md-4">
				<label for="sexo" class="control-label">Género</label><br>
				<input type="radio" id="sexo" name="sexo" value="M" {!! (old('sexo',$docente->sexo)=='M')? 'checked':'' !!}> M<br>
		  		<input type="radio" id="sexo" name="sexo" value="F" {!! (old('sexo',$docente->sexo)=='F')? 'checked':'' !!}> F<br>
			</div>

			<div class="col-md-6">
				<label for="depto" class="control-label">Departamento</label>
				<select id="depto" name="depto" class="form-control">
					<option value="">Seleccione departamento</option>
					@foreach($depto as $dep)
					<option value="{!! $dep->id !!}" {{(old('depto',$docente->depto)==$dep->id)? 'selected':''}}>{!! $dep->nombre !!}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-4">
				<label for="inv" class="control-label">Línea de generación de con.</label>
				<select id="inv" name="inv" class="form-control">
					<option value="">Seleccione línea de generación de con.</option>
					@foreach($inv as $i)
					<option value="{!! $i->id !!}" {{(old('inv',$docente->inv)==$i->id)? 'selected':''}}>{!! $i->nombre !!}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
				<a href="{{ route('docentes.index') }}" class="btn btn-raised btn-primary">Cancelar</a>
			</div>
			
		</form>
	</div>
@endsection