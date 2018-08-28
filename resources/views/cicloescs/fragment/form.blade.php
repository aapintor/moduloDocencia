	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-md-6">
		<label class="control-label" for="periodo">Periodo</label>
		<select class="form-control" id="periodo" name="periodo">
			<option value="periodo">Seleccione periodo</option>
			<option value="ENERO-JUNIO">ENERO-JUNIO</option>
			<option value="AGOSTO-DICIEMBRE">AGOSTO-DICIEMBRE</option>
		</select>
	</div>

	<div class="col-md-6">
		<label class="control-label" for="anio">Año</label>
		<input class="form-control" type="text" id="anio" name="anio" maxlength="4">
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
	        <a href="{{ route('cicloescs.index') }}" class="btn btn-raised btn-primary">Aceptar</a>
	      	<a href="{{ url()->current() }}" class="btn btn-raised btn-primary">Cancelar</a>
	      </div>
	    </div>
	  </div>
	</div>