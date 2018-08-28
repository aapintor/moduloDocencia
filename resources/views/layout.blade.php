<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto Docencia</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('bower_components/bootstrap-material-design/dist/css/ripples.min.css') }}">
    <script type="text/javascript" src=" {{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src=" {{ url('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src=" {{ url('bower_components/bootstrap-material-design/dist/js/ripples.min.js') }}"></script>
    <script type="text/javascript" src=" {{ url('bower_components/bootstrap-material-design/dist/js/material.min.js') }}"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
        <div class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos
                <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('alumnos.index') }}">Alumnos</a></li>
                <li><a href="{{ route('carreras.index') }}">Carreras </a></li>
                <li><a href="{{ route('plans.index') }}">Planes de Est. </a></li>
                <li><a href="{{ route('opcionts.index') }}">Opciones de Titu. </a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Círc. Estudios
                <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('materias.index') }}">Materias </a></li>
                <li><a href="{{ route('grupos.index') }}">Grupos </a></li>
                <li><a href="{{ route('cicloescs.index') }}">Ciclo Escolar </a></li>
                <li><a href="gen_lista_c">Lista de alumnos </a></li>
                <li><a href="gen_horario">Horario </a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Docentes
                <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('docentes.index') }}">Docentes </a></li>
                <li><a href="{{ route('deptos.index') }}">Departamentos </a></li>
                <li><a href="{{ route('lineainvs.index') }}">Línea de Conocimiento </a></li>
              </ul>
            </li>

             <li class="dropdown">
              <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Titulaciones
                <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('titulacions.index') }}">Titulaciones </a></li>
                <li><a href="gen_reporte_a">Reporte por año </a></li>
                <li><a href="gen_reporte_d">Reporte por docente </a></li>
              </ul>
            </li>

            <li><a href="{{ route('acomplementarias.index') }}">Actividades Complementarias</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->usuario }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Cerrar sesión
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                </ul>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="panel panel-default">
          <div class="panel-body">
            @yield('content')
          </div>
        </div>
    </div>
</body>
</html>

    
