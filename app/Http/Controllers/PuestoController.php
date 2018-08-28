<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puesto;
use App\Docente;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PuestoRequest;

class PuestoController extends Controller
{
    public function index(Request $request)
    {
    	$puestos= Puesto::orderBy('id','DESC')->paginate();
        return view('puestos.index',compact('puestos'));
    }

    public function create()
    {
        $docente=Docente::select('rfc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        return view('puestos.create',compact('docente'));
    }

    public function store(PuestoRequest $request)
    {   
        $pt= $request->puesto;
        $id = Puesto::select('id')->where('puesto','like',"%$pt%") -> first();
        if(!$id){
            $puesto = new Puesto;
            $puesto->puesto  = $request->puesto;
            $puesto->docente = $request->docente;
            $puesto->save();
        }
        else{
            $puesto = Puesto::find($id)->first();
            $puesto->puesto  = $request->puesto;
            $puesto->docente = $request->docente;
            $puesto->save();
        }
        return redirect()->route('docentes.index')
                         ->with('info','El puesto fue asignado');
    }
}
