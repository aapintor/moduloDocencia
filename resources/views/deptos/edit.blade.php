@extends('layout')

@section('content')
	<div >
		<div class="input-field col s8">
			<legend><strong> Editar Departamento</strong></legend>
		</div>
		<form action="{{ route('deptos.update', $depto->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT')}}
			<div class="col-md-6 form-group">
				<label class="control-label" for="nombre">Nombre del departamento</label>
				<input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre', $depto->nombre) }}">
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
			        <a href="{{ route('deptos.index') }}" class="btn btn-raised btn-primary">Aceptar</a>
			      	<a href="{{ url()->current() }}" class="btn btn-raised btn-primary">Cancelar</a>
			      </div>
			    </div>
			  </div>
			</div>
		</form>
	</div>
@endsection