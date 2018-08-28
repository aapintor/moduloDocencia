@extends('layout')

@section('content')
<span>Asignar puestos</span>

@include('puestos.fragment.error')

<form action="{{ route('puestos.store') }}" method="POST" class="form">
	@include('puestos.fragment.form')
</form>

@endsection