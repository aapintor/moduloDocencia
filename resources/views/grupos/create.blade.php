@extends('layout')

@section('content')
<h2>Registrar grupo</h2>

@include('grupos.fragment.error')

<form action="{{ route('grupos.store') }}" method="POST" class="form">
	@include('grupos.fragment.form')
</form>

@endsection