@extends('layout')

@section('content')
<span>Registrar Plan</span>

@include('plans.fragment.error')

<form action="{{ route('plans.store') }}" method="POST">
	@include('plans.fragment.form')
</form>
@endsection