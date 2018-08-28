<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Carrera;
use App\Plan;
use App\Http\Requests\AlumnoRequest;

class AlumnoController extends Controller
{
    public function index(Request $request)
    {
    	$alumnos= Alumno::SearchA($request->s)->orderBy('paterno','ASC')->paginate();
        return view('alumnos.index',compact('alumnos'));
    }

    public function create()
    {
        $carrera=Carrera::select('nombre','id')->get();
        $plan=Plan::select('nombre','id')->get();
    	return view('alumnos.create', compact('carrera'),compact('plan'));
    }

    public function store(AlumnoRequest $request)
    {
    	$alumno = new Alumno;
    	$alumno->nombre   = mb_strtoupper($request->nombre,'UTF-8');
    	$alumno->paterno  = mb_strtoupper($request->paterno,'UTF-8');
    	$alumno->materno  = mb_strtoupper($request->materno,'UTF-8');
    	$alumno->nc       = $request->nc;
    	$alumno->carrera  = $request->carrera;
        $alumno->plan     = $request->plan;
    	$alumno->email    = $request->email;
    	$alumno->celular  = $request->celular;
    	$alumno->calle    = mb_strtoupper($request->calle,'UTF-8');
    	$alumno->colonia  = mb_strtoupper($request->colonia,'UTF-8');
    	$alumno->num 	  = $request->num;

        $alumno->save();

    	return redirect()->route('alumnos.index');
    					 #->with('info','El producto fue actualizado');
    }

    public function edit($nc)
    {
        $alumno  = Alumno::find($nc);
        $carrera = Carrera::select('nombre','id')->get();
        $plan    = Plan::select('nombre','id')->get();
        return view('alumnos.edit', compact('alumno','carrera','plan'));
    }

    public function update(AlumnoRequest $request, $nc)
    {
        $alumno = Alumno::find($nc);
        $alumno->nombre   = mb_strtoupper($request->nombre,'UTF-8');
    	$alumno->paterno  = mb_strtoupper($request->paterno,'UTF-8');
    	$alumno->materno  = mb_strtoupper($request->materno,'UTF-8');
    	$alumno->nc       = $request->nc;
    	$alumno->carrera  = $request->carrera;
        $alumno->plan     = $request->plan;
    	$alumno->email    = $request->email;
    	$alumno->celular  = $request->celular;
    	$alumno->calle    = mb_strtoupper($request->calle,'UTF-8');
    	$alumno->colonia  = mb_strtoupper($request->colonia,'UTF-8');
    	$alumno->num 	  = $request->num;

        $alumno->save();
        return redirect()->route('alumnos.index');
    }
}
