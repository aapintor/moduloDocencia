<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Opciont;
use App\Http\Requests\OpciontRequest;

class OpcionTController extends Controller
{
    public function index(Request $request)
    {
    	$opcionts= Opciont::select('opcion_ts.id as id','opcion_ts.nopcion','opcion_ts.opcion','plans.nombre as plan')->join('plans','plans.id','=','opcion_ts.plan')->orderBy('plan','ASC')->paginate();
        return view('opcionts.index',compact('opcionts'));
    }

    public function create()
    {
    	$plan=Plan::select('nombre','id')->get();
    	return view('opcionts.create', compact('plan'));
    }

    public function store(OpciontRequest $request)
    {
    	$opciont = new opciont;
    	$opciont->plan 		= $request->plan;
    	$opciont->nopcion  	= $request->nopcion;
    	$opciont->opcion  	= mb_strtoupper($request->opcion,'UTF-8');

        $opciont->save();
    	return redirect()->route('opcionts.index');
    }

    public function edit($id)
    {
        $opciont  = opciont::find($id);
        $plan=Plan::select('nombre','id')->get();
        return view('opcionts.edit',compact('opciont','plan'));
    }

    public function update(opciontRequest $request, $id)
    {
        $opciont = Opciont::find($id);
        $opciont->plan 		= $request->plan;
    	$opciont->nopcion  	= $request->nopcion;
    	$opciont->opcion   = mb_strtoupper($request->opcion,'UTF-8');

        $opciont->save();
        return redirect()->route('opcionts.index');
    }   
}
