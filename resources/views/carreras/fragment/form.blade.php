	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="col-md-6">
    <label class="control-label" for="nombre">Nombre de la carrera</label>
    <input class="form-control" type="text" id="nombre" name="nombre" style="text-transform:uppercase;">
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
          <a href="{{ route('carreras.index') }}" class="btn btn-raised btn-primary">Aceptar</a>
          <a href="{{ url()->current() }}" class="btn btn-raised btn-primary">Cancelar</a>
        </div>
      </div>
    </div>
  </div>