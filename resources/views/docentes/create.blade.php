@extends('layout')

@section('content')
<h2>Registrar Docente</h2>

@include('docentes.fragment.error')

<form action="{{ route('docentes.store') }}" method="POST" class="form">
	@include('docentes.fragment.form')
</form>

@endsection