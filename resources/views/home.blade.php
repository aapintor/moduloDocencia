@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Proyecto Docencia</h3></div>
                <div class="divider"></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido al sistema de la Oficina de Proyecto Docencia, en este sistema podrás administrar Círculos de estudios y Actividades Complementarias.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
