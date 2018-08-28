@extends('layout')

@section('content')
<span class="card-title">Registrar Opción de titulación</span>

@include('opcionts.fragment.error')

<form action="{{ route('opcionts.store') }}" method="POST">
	@include('opcionts.fragment.form')
</form>

@endsection