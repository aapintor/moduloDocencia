	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-12">
		<label for="alumno" class="control-label">Alumno</label>
		<select id="alumno" name="alumno" class="form-control">
			<option value="">Seleccione Alumno</option>
			@foreach($alumno as $alu)
			<option value="{!! $alu->nc !!}">{!! $alu->completo !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-4">
		<label for="plan" class="control-label">Plan de estudios</label>
		<select id="plan" name="plan" class="form-control">
			<option value="">Seleccione Plan de estudios</option>
			@foreach($plan as $p)
			<option value="{!! $p->id!!}">{!! $p->nombre !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-4">
		<label for="opc_titu" class="control-label">Opción de titulación</label>
		<select id="opc_titu" name="opc_titu" class="form-control">
			<option value="">Seleccione Opción de titulación</option>
			@foreach($opcion as $op)
				<option value="{!! $op->id !!}">{!! $op->opcion !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-4">
		<label for="proyecto" class="control-label">Nombre del proyecto</label>
		<input type="text" id="proyecto" name="proyecto" class="form-control" style="text-transform:uppercase;">
	</div>
	<br>
	<hr>
	<br>
	<div class="col-md-12">
		<label for="asesor" class="control-label">Asesor</label>
		<select id="asesor" name="asesor" class="form-control">
			<option value="">Seleccione Asesor</option>
			@foreach($docente as $doc)
			<option value="{!! $doc->rfc !!}">{!! $doc->completo !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-4">
		<label for="sinodal1" class="control-label">Sinodal</label>
		<select id="sinodal1" name="sinodal1" class="form-control">
			<option value="">Seleccione Sinodal</option>
			@foreach($docente as $doc)
			<option value="{!! $doc->rfc !!}">{!! $doc->completo !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-4">
		<label for="sinodal2" class="control-label">Sinodal</label>
		<select id="sinodal2" name="sinodal2" class="form-control">
			<option value="">Seleccione Sinodal</option>
			@foreach($docente as $doc)
			<option value="{!! $doc->rfc !!}">{!! $doc->completo !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-4">
		<label for="sinodal3" class="control-label">Sinodal</label>
		<select id="sinodal3" name="sinodal3" class="form-control">
			<option value="">Seleccione Sinodal</option>
			@foreach($docente as $doc)
			<option value="{!! $doc->rfc !!}">{!! $doc->completo !!}</option>
			@endforeach
		</select>
	</div>

	<div class="col-md-4">
		<input type="checkbox" id="aec" name="aec" value="AE">Asesor Externo
	</div>

	<div class="col-md-4" style="display: none;" id="aediv" name="aediv">
		<label for="ae" class="control-label">Nombre del Asesor</label>
		<input type="text" id="ae" name="ae" class="form-control" style="text-transform:uppercase;">
	</div>

	<p class="col-md-12">
		<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
		<a data-toggle="modal" data-target="#modal1" class="btn btn-raised btn-primary">Cancelar</a>
	</p>

	 

  <!-- Modal Structure -->
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

	<script type="text/javascript">
		$('#aec').on('click', function(){
		if ( $(this).prop('checked') ) {
		    $('#aediv').show();
		} 
		else {
		    $('#aediv').hide();
		}
		});
	</script>