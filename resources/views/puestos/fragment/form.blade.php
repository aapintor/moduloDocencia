	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-6"> 
		<label for="puesto" class="control-label">Puesto</label>
		<select id="puesto" name="puesto" class="form-control">
			<option value="">Seleccione puesto</option>
			<option value="jefedepto">Jefe del Departamento</option>
			<option value="jefedocencia">Jede de Docencia</option>
			<option value="presidenteaca">Presidente de academia</option>
			<option value="jefeescolares">Jefe del depto. de Serv. escolares</option>
			<option value="jefediv">Jefe de Div. de estudios profesionales</option>
		</select>
	</div>
	<div class="col-md-6">
		<label for="docente" class="control-label">Docente</label>
		<select id="docente" name="docente" class="form-control">
			<option value="">Seleccione docente</option>
			@foreach($docente as $doc)
			<option value="{!! $doc->rfc !!}">{!! $doc->completo !!}</option>
			@endforeach
		</select>
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
	        <a href="{{ route('docentes.index') }}" class="btn btn-raised btn-primary">Aceptar</a>
	      	<a href="{{ url()->current() }}" class="btn btn-raised btn-primary">Cancelar</a>
	      </div>
	    </div>
	  </div>
	</div>