<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Depto;
use App\LineaInv;
use App\Http\Requests\DocenteRequest;

class DocenteController extends Controller
{
    public function index(Request $request)
    {
        $docentes= Docente::SearchD($request->s)->orderBy('rfc','ASC')->paginate();
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        $depto=Depto::select('nombre','id')->get();
        $inv=LineaInv::select('nombre','id')->get();
    	return view('docentes.create', compact('depto'),compact('inv'));
    }
    public function store(DocenteRequest $request)
    {
    	$docente = new Docente;
    	$docente->nombre   = mb_strtoupper($request->nombre,'UTF-8');
    	$docente->paterno  = mb_strtoupper($request->paterno,'UTF-8');
    	$docente->materno  = mb_strtoupper($request->materno,'UTF-8');
    	$docente->rfc      = mb_strtoupper($request->rfc,'UTF-8');
    	$docente->grado    = $request->grado;
        $docente->desc     = mb_strtoupper($request->desc,'UTF-8');
    	$docente->email    = $request->email;
    	$docente->sexo     = $request->sexo;
    	$docente->depto    = $request->depto;
    	$docente->inv      = $request->inv;

        $docente->save();

    	return redirect()->route('docentes.index');
    					 #->with('info','El producto fue actualizado');
    }

    public function edit($rfc)
    {
        $docente = Docente::find($rfc);
        $depto=Depto::select('nombre','id')->get();
        $inv=LineaInv::select('nombre','id')->get();
        return view('docentes.edit', compact('docente','depto','inv'));
    }

    public function update(DocenteRequest $request, $rfc)
    {
        $docente = Docente::find($rfc);
        $docente->nombre    = mb_strtoupper($request->nombre,'UTF-8');
        $docente->paterno   = mb_strtoupper($request->paterno,'UTF-8');
        $docente->materno   = mb_strtoupper($request->materno,'UTF-8');
        $docente->rfc       = mb_strtoupper($request->rfc,'UTF-8');
        $docente->grado     = $request->grado;
        $docente->desc      = mb_strtoupper($request->desc,'UTF-8');
        $docente->email     = $request->email;
        $docente->sexo      = $request->sexo;
        $docente->depto     = $request->depto;
        $docente->inv       = $request->inv;
        $docente->save();
        return redirect()->route('docentes.index');
    }


}
