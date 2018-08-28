@extends('layout')

@section('content')
<span>Registrar Carrera</span>

@include('carreras.fragment.error')

<form action="{{ route('carreras.store') }}" method="POST">
	@include('carreras.fragment.form')
</form>

@endsection