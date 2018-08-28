@extends('layout')

@section('content')
<h3>Registrar Línea de Investigación</h3>

@include('lineainvs.fragment.error')

<form action="{{ route('lineainvs.store') }}" method="POST">
	@include('lineainvs.fragment.form')
</form>

@endsection