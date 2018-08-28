<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Http\Requests\CarreraRequest;

class CarreraController extends Controller
{
    public function index(Request $request)
    {
    	$carreras= Carrera::Search($request->s)->orderBy('id','DESC')->paginate();
        return view('carreras.index',compact('carreras'));
    }

    public function create()
    {
    	return view('carreras.create');
    }

    public function store(CarreraRequest $request)
    {
    	$carrera = new Carrera;
    	$carrera->nombre  = mb_strtoupper($request->nombre,'UTF-8');

        $carrera->save();
    	return redirect()->route('carreras.index');
    					 #->with('info','El producto fue actualizado');
    }

    public function edit($id)
    {
        $carrera  = \App\Carrera::find($id);
        return view('carreras.edit',compact('carrera'));
    }

    public function update(CarreraRequest $request, $id)
    {
        $carrera = \App\Carrera::find($id);
        $carrera->nombre   = mb_strtoupper($request->nombre,'UTF-8');

        $carrera->save();
        return redirect()->route('carreras.index');
    }
}
