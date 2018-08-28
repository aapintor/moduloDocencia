@extends('layout')

@section('content')

<h2>Registrar alumno</h2>

@include('alumnos.fragment.error')

<form action="{{ route('alumnos.store') }}" method="POST" class="form">
	@include('alumnos.fragment.form')
</form>

@endsection