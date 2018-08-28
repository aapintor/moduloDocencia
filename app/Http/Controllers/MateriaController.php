<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Http\Requests\MateriaRequest;

class MateriaController extends Controller
{
    public function index(Request $request)
    {
    	$materias= Materia::Search($request->s)->orderBy('id','DESC')->paginate();
        return view('materias.index',compact('materias'));
    }

    public function create()
    {
    	return view('materias.create');
    }

    public function store(MateriaRequest $request)
    {
    	$materia = new Materia;
    	$materia->nombre  = mb_strtoupper($request->nombre,'UTF-8');

        $materia->save();
    	return redirect()->route('materias.index');
    					 #->with('info','El producto fue actualizado');
    }

    public function edit($id)
    {
        $materia  = \App\Materia::find($id);
        return view('materias.edit',compact('materia'));
    }

    public function update(MateriaRequest $request, $id)
    {
        $materia = Materia::find($id);
        $materia->nombre   = mb_strtoupper($request->nombre,'UTF-8');

        $materia->save();
        return redirect()->route('materias.index');
    }
}
