<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lineainv;
use App\Http\Requests\LineainvRequest;

class LineaInvController extends Controller
{
	public function index(Request $request)
    {
    	$invs= LineaInv::Search($request->s)->orderBy('id','DESC')->paginate();
        return view('lineainvs.index',compact('invs'));
    }

    public function create()
    {
    	return view('lineainvs.create');
    }

    public function store(LineainvRequest $request)
    {
    	$inv = new LineaInv;
    	$inv->nombre  = mb_strtoupper($request->nombre,'UTF-8');

        $inv->save();
    	return redirect()->route('lineainvs.index');
    					 #->with('info','El producto fue actualizado');
    }

    public function edit($id)
    {
        $inv  = LineaInv::find($id);
        return view('lineainvs.edit',compact('inv'));
    }

    public function update(lineainvRequest $request, $id)
    {
        $inv = LineaInv::find($id);
        $inv->nombre   = mb_strtoupper($request->nombre,'UTF-8');

        $inv->save();
        return redirect()->route('lineainvs.index');
    }
}
   
