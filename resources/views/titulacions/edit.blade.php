@extends('layout')

@section('content')
	<div >
		<div class="input-field col s8">
			<legend><strong> Editar Titulación</strong></legend>
		</div>
		<br>
		<br>
		<form action="{{ route('titulacions.update', $titulacion->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT')}}
			<div class="col-md-12">
				<label for="alumno" class="control-label">Alumno</label>
				<select id="alumno" name="alumno" class="form-control" required="required">
					<option value="alumno">Seleccione Alumno</option>
					@foreach($alumno as $alu)
					<option value="{!! $alu->nc !!}" {{(old('alumno',$titulacion->alumno)==$alu->nc)? 'selected':''}}>{!! $alu->completo !!}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-4">
				<label for="plan" class="control-label">Plan de estudios</label>
				<select id="plan" name="plan" class="form-control" required="">
					<option value="plan">Seleccione Plan de estudios</option>
					@foreach($plan as $p)
					<option value="{!! $p->id!!}" {{(old('plan',$titulacion->plan)==$p->id)? 'selected':''}}>{!! $p->nombre !!}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-4">
				<label for="opc_titu" class="control-label">Opción de titulación</label>
				<select id="opc_titu" name="opc_titu" class="form-control" required="">
					<option value="opc_titu">Seleccione Opción de titulación</option>
					@foreach($opcion as $op)
						<option value="{!! $op->id !!}" {{(old('opc_titu',$titulacion->opc_titu)==$op->id)? 'selected':''}}>{!! $op->opcion !!}</option>
					@endforeach
				</select>
			</div> 

			<div class="col-md-4">
				<label for="proyecto" class="control-label">Nombre del proyecto</label>
				<input type="text" id="proyecto" name="proyecto" class="form-control" style="text-transform:uppercase;" value="{{ old('proyecto', $titulacion->proyecto) }}" required="">
			</div>
			<br>
			<hr>
			<br>
			<div class="col-md-12">
				<label for="asesor" class="control-label">Asesor</label>
				<select id="asesor" name="asesor" class="form-control" required="">
					<option value="asesor">Seleccione Asesor</option>
					@foreach($docente as $doc)
					<option value="{!! $doc->rfc !!}" {{(old('asesor',$titulacion->asesor)==$doc->rfc)? 'selected':''}}>{!! $doc->completo !!}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-4">
				<label for="sinodal1" class="control-label">Sinodal</label>
				<select id="sinodal1" name="sinodal1" class="form-control" required="">
					<option value="sinodal1">Seleccione Sinodal</option>
					@foreach($docente as $doc)
					<option value="{!! $doc->rfc !!}" {{(old('sinodal1',$titulacion->sinodal1)==$doc->rfc)? 'selected':''}}>{!! $doc->completo !!}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-4">
				<label for="sinodal2" class="control-label">Sinodal</label>
				<select id="sinodal2" name="sinodal2" class="form-control" required="">
					<option value="sinodal2">Seleccione Sinodal</option>
					@foreach($docente as $doc)
					<option value="{!! $doc->rfc !!}" {{(old('sinodal2',$titulacion->sinodal2)==$doc->rfc)? 'selected':''}}>{!! $doc->completo !!}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-4">
				<label for="sinodal3" class="control-label">Sinodal</label>
				<select id="sinodal3" name="sinodal3" class="form-control" required="">
					<option value="sinodal3">Seleccione Sinodal</option>
					@foreach($docente as $doc)
					<option value="{!! $doc->rfc !!}" {{(old('sinodal3',$titulacion->sinodal3)==$doc->rfc)? 'selected':''}}>{!! $doc->completo !!}</option>
					@endforeach
				</select>
			</div>


			<p class="col-md-12">
				<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
				<button data-toggle="modal" data-target="#modal1" class="btn btn-raised btn-primary">Cancelar</button>
			</p>
			
		</form>
	</div>
	<!-- Modal -->
	<div class="modal" id="modal1" name="modal1">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-body">
	        <p>¿Seguro de que desea cancelar?</p>
	      </div>
	      <div class="modal-footer">
	        <a href="{{ route('titulacions.index') }}" class="btn btn-raised btn-primary">Aceptar</a>
	      	<a href="{{ url()->current() }}" class="btn btn-raised btn-primary">Cancelar</a>
	      </div>
	    </div>
	  </div>
	</div>
@endsection