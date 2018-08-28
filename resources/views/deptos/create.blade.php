@extends('layout')

@section('content')
<h3>Registrar Departamento</h3>

@include('deptos.fragment.error')

<form action="{{ route('deptos.store') }}" method="POST">
	@include('deptos.fragment.form')
</form>

@endsection