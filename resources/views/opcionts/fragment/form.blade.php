  <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
     <label class="control-label" for="nopcion">No. de opción</label>
    <input class="form-control" type="text" id="nopcion" name="nopcion" style="text-transform:uppercase;">
  </div>
  
  <div class="col-md-6">
    <label class="control-label" for="opcion">Opción de titulación</label>
    <input class="form-control" type="text" id="opcion" name="opcion" style="text-transform:uppercase;">
  </div>

	<p class="col-md-12">
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
          <a href="{{ route('opcionts.index') }}" class="btn btn-raised btn-primary">Aceptar</a>
          <a href="{{ url()->current() }}" class="btn btn-raised btn-primary">Cancelar</a>
        </div>
      </div>
    </div>
  </div>