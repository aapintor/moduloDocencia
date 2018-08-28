<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Depto;
use App\Http\Requests\DeptoRequest;

class DeptoController extends Controller
{
	public function index(Request $request)
    {
    	$deptos= Depto::Search($request->s)->orderBy('id','DESC')->paginate();
        return view('deptos.index',compact('deptos'));
    }

    public function create()
    {
    	return view('deptos.create');
    }

    public function store(DeptoRequest $request)
    {
    	$depto = new Depto;
    	$depto->nombre  = mb_strtoupper($request->nombre,'UTF-8');

        $depto->save();
    	return redirect()->route('deptos.index');
    					 #->with('info','El producto fue actualizado');
    }

    public function edit($id)
    {
        $depto  = Depto::find($id);
        return view('deptos.edit',compact('depto'));
    }

    public function update(deptoRequest $request, $id)
    {
        $depto = Depto::find($id);
        $depto->nombre   = mb_strtoupper($request->nombre,'UTF-8');

        $depto->save();
        return redirect()->route('deptos.index');
    }
    
}
