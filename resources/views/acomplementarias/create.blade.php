@extends('layout')

@section('content')
<span class="card-title">Registrar Actividad complementaria</span>

@include('acomplementarias.fragment.error')

<form action="{{ route('acomplementarias.store') }}" method="POST" class="form">
	@include('acomplementarias.fragment.form')
</form>

@endsection