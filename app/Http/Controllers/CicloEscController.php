<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CicloEsc;
use App\Http\Requests\CicloEscRequest;

class CicloEscController extends Controller
{
     public function index(Request $request)
    {
    	$cicloescs= CicloEsc::SearchCE($request->s)->orderBy('anio','ASC')->orderBy('periodo','DESC')->paginate();
        return view('cicloescs.index',compact('cicloescs'));
    }

     public function create()
    {
    	return view('cicloescs.create');
    }

    public function store(CicloEscRequest $request)
    {
    	$cicloesc = new CicloEsc;
    	$cicloesc->periodo  = $request->periodo;
    	$cicloesc->anio  = $request->anio;

        $cicloesc->save();
    	return redirect()->route('cicloescs.index');
    					 #->with('info','El producto fue actualizado');
    }

    public function edit($id)
    {
        $cicloesc  = \App\CicloEsc::find($id);
        return view('cicloescs.edit',compact('cicloesc'));
    }

    public function update(cicloescRequest $request, $id)
    {
        $cicloesc = \App\CicloEsc::find($id);
        $cicloesc->periodo  = $request->periodo;
    	$cicloesc->anio  = $request->anio;

        $cicloesc->save();
        return redirect()->route('cicloescs.index');
    }
}
