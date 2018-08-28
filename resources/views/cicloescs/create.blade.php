@extends('layout')

@section('content')
<h3>Registrar Ciclo Escolar</h3>

@include('cicloescs.fragment.error')

<form action="{{ route('cicloescs.store') }}" method="POST">
	@include('cicloescs.fragment.form')
</form>

@endsection