<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



    Route::resource('docentes','DocenteController',[
        'except' => ['destroy']
    ]);
    Route::resource('deptos','DeptoController',[
        'except' => ['destroy']
    ]);
    Route::resource('lineainvs','LineaInvController',[
        'except' => ['destroy']
    ]);
    Route::resource('plans','PlanController',[
        'except' => ['destroy']
    ]);
    Route::resource('alumnos','AlumnoController',[
        'except' => ['destroy']
    ]);
    Route::resource('carreras','CarreraController',[
        'except' => ['destroy']
    ]);
    Route::resource('acomplementarias','AComplementariaController',[
        'except' => ['destroy']
    ]);
    Route::resource('cicloescs','CicloEscController',[
        'except' => ['destroy']
    ]);
    Route::resource('puestos','PuestoController',[
        'except' => ['destroy','edit','update']
    ]);

    Route::resource('materias','MateriaController',[
        'except' => ['destroy']
    ]);

    Route::resource('opcionts','OpcionTController',[
        'except' => ['destroy']
    ]);

    Route::resource('grupos','GrupoController',[
        'except' => ['destroy']
    ]);

    Route::resource('titulacions','TitulacionController',[
        'except' => ['destroy']
    ]);

    Route::post('crear_constancia_ac/{nc}', 'PdfController@crear_constancia_ac');

    Route::post('crear_constancia_ce/{nc}', 'PdfController@crear_constancia_ce');

    Route::post('crear_reporte_a','PdfController@crear_reporte_a');

    Route::post('crear_reporte_d','PdfController@crear_reporte_d');

    Route::post('crear_lista_c','PdfController@crear_lista_circulos');
    
    Route::post('crear_horario','PdfController@crear_horario');

    Route::get('listar_ac/{nc}', 'AComplementariaController@listar_ac');

    Route::get('listar_grupo/{nc}', 'GrupoController@listar_grupo');

    Route::get('detalles_titu/{nc}', 'TitulacionController@detalles_titu');

    Route::get('gen_reporte_a','TitulacionController@gen_reporte_a');

    Route::get('gen_reporte_d','TitulacionController@gen_reporte_d');

    Route::get('gen_lista_c','GrupoController@gen_lista_c');

    Route::get('gen_horario','GrupoController@gen_horario');

    Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
