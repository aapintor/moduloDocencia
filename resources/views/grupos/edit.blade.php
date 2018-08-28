@extends('layout')

@section('content')
	<div >
		<div class="col-md-8">
			<legend><strong> Editar grupo</strong></legend>
		</div>
		<br>
		<br>
		<form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT')}}
				<div class="col-md-4 form-group">
					<label for="alumno" class="control-label">Alumno</label>
					<select id="alumno" name="alumno" class="form-control">
						<option value="">Seleccione Alumno</option>
						@foreach($alumno as $alu)
						<option value="{!! $alu->nc !!}" {{(old('alumno',$grupo->alumno)==$alu->nc)? 'selected':''}}>{!! $alu->completo !!}</option>
						@endforeach
					</select>
				</div>

				<div class="col-md-4 form-group">
					<label for="materia" class="control-label">Materia</label>
					<select id="materia" name="materia" class="form-control">
						<option value="">Seleccione Materia</option>
						@foreach($materia as $mat)
						<option value="{!! $mat->id !!}" {{(old('materia',$grupo->materia)==$mat->id)? 'selected':''}}>{!! $mat->nombre !!}</option>
						@endforeach
						
					</select>
				</div>

				<div class="col-md-4 form-group">
					<label for="ciclo" class="control-label">Ciclo Escolar</label>
					<select id="ciclo" name="ciclo" class="form-control">
						<option value="">Seleccione Ciclo</option>
						@foreach($cicloesc as $ci)
						<option value="{!! $ci->id !!}" {{(old('ciclo',$grupo->ciclo)==$ci->id)? 'selected':''}}>{!! $ci->ciclo !!}</option>
						@endforeach
					</select>
				</div>

				<div class="col-md-4 form-group">
					<label for="dia1" class="control-label">Día</label>
					<select id="dia1" name="dia1" class="form-control">
						<option value="">Seleccione día</option>
						<option value="L" {!! (old('dia1',$grupo->dia1)=='L')? 'selected':'' !!}>Lunes</option>
						<option value="M" {{(old('dia1',$grupo->dia1)=='M')? 'selected':''}}>Martes</option>
						<option value="X" {{(old('dia1',$grupo->dia1)=='X')? 'selected':''}}>Miércoles</option>
						<option value="J" {{(old('dia1',$grupo->dia1)=='J')? 'selected':''}}>Jueves</option>
						<option value="V" {{(old('dia1',$grupo->dia1)=='V')? 'selected':''}}>Viernes</option>
					</select>
				</div>

				<div class="col-md-4 form-group">
					<label for="hora1" class="control-label">Hora</label>
					<input type="text" id="hora1" name="hora1" class="form-control" value="{{ old('hora1', $grupo->hora1) }}">
				</div>

				<div class="col-md-4 form-group">
					<label for="salon1" class="control-label">Salón</label>
					<input type="text" id="salon1" name="salon1" class="form-control" style="text-transform:uppercase;" value="{{ old('salon1', $grupo->salon1) }}">
				</div>

				<div class="col-md-4 form-group">
					<label for="dia2" class="control-label">Día</label>
					<select id="dia2" name="dia2" class="form-control">
						<option value="">Seleccione día</option>
						<option value="L" {!! (old('dia2',$grupo->dia2)=='L')? 'selected':'' !!}>Lunes</option>
						<option value="M" {!! (old('dia2',$grupo->dia2)=='M')? 'selected':'' !!}>Martes</option>
						<option value="X" {!! (old('dia2',$grupo->dia2)=='X')? 'selected':'' !!}>Miércoles</option>
						<option value="J" {!! (old('dia2',$grupo->dia2)=='J')? 'selected':'' !!}>Jueves</option>
						<option value="V" {!! (old('dia2',$grupo->dia2)=='V')? 'selected':'' !!}>Viernes</option>
					</select>
				</div>

				<div class="col-md-4 form-group">
					<label class="control-label" for="hora2">Hora</label>
					<input type="text" class="form-control" id="hora2" name="hora2" value="{{ old('hora2', $grupo->hora2) }}">
				</div>

				<div class="col-md-4 form-group">
					<label for="salon2" class="control-label">Salón</label>
					<input type="text" id="salon2" name="salon2" class="form-control" style="text-transform:uppercase;" value="{{ old('salon2', $grupo->salon2) }}">
				</div>

				<p class="col-md-12 form-group">
					<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
					<button data-toggle="modal" data-target="#modal1" class="btn btn-raised btn-primary">Cancelar</button>
				</p>

				 

			<!-- Modal Structure -->
			<div class="modal" id="modal1" name="modal1">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-body">
			        <p>¿Seguro de que desea cancelar?</p>
			      </div>
			      <div class="modal-footer">
			        <a href="{{ route('materias.index') }}" class="btn btn-raised btn-primary">Aceptar</a>
			      	<a href="{{ url()->current() }}" class="btn btn-raised btn-primary">Cancelar</a>
			      </div>
			    </div>
			  </div>
			</div>
		</form>
	</div>
@endsection