@extends('layout')

@section('content')
<span class="card-title">Registrar Titulación</span>

@include('titulacions.fragment.error')

<form action="{{ route('titulacions.store') }}" method="POST" class="form">
	@include('titulacions.fragment.form')
</form>

@endsection