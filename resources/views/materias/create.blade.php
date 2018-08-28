@extends('layout')

@section('content')
<h2>Registrar materia</h2>
@include('materias.fragment.error')

<form action="{{ route('materias.store') }}" method="POST">
	@include('materias.fragment.form')
</form>

@endsection