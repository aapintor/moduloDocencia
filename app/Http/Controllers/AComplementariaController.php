<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AComplementaria;
use App\Alumno;
use App\Docente;
use App\Http\Requests\AComplementariaRequest;
use Illuminate\Support\Facades\DB;

class AComplementariaController extends Controller
{
	public function index(Request $request)
    {
        $alumnos= Alumno::SearchA($request->s)->orderBy('paterno','ASC')->paginate();
        return view('acomplementarias.index',compact('alumnos'));
    }

    public function create()
    {   
        $alumno=Alumno::select('nc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        $docente=Docente::select('rfc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
    	return view('acomplementarias.create', compact('alumno','docente'));
    }

    public function store(AcomplementariaRequest $request)
    {
    	$acomplementaria = new Acomplementaria;
    	$acomplementaria->alumno  	   	= $request->alumno;
    	$acomplementaria->actividad  	= mb_strtoupper($request->actividad,'UTF-8');
    	$acomplementaria->creditos   	= $request->creditos;
    	$acomplementaria->fecha_del  	= $request->fecha_del;
        $acomplementaria->fecha_al   	= $request->fecha_al;
    	$acomplementaria->horas      	= $request->horas;
    	$acomplementaria->calificacion	= $request->calificacion;
    	$acomplementaria->docente_resp	= $request->docente_resp;

        $acomplementaria->save();

    	return redirect()->route('acomplementarias.index');
    					 #->with('info','El producto fue actualizado');
    }

    public function edit($id)
    {
        $acomplementaria  = \App\Acomplementaria::find($id);
        $alumno=Alumno::select('nc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        $docente=Docente::select('rfc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        return view('acomplementarias.edit', compact('acomplementaria','alumno','docente'));
    }

    public function update(AcomplementariaRequest $request, $id)
    {
        $acomplementaria = \App\Acomplementaria::find($id);
        $acomplementaria->actividad     = mb_strtoupper($request->actividad,'UTF-8');
        $acomplementaria->alumno  	   	= $request->alumno;
    	$acomplementaria->creditos   	= $request->creditos;
    	$acomplementaria->fecha_del  	= $request->fecha_del;
        $acomplementaria->fecha_al   	= $request->fecha_al;
    	$acomplementaria->horas      	= $request->horas;
    	$acomplementaria->calificacion	= $request->calificacion;
    	$acomplementaria->docente_resp	= $request->docente_resp;

        $acomplementaria->save();
        return redirect()->route('acomplementarias.index');
    }

    public function listar_ac($nc){
        $acomplementarias  = Acomplementaria::where('alumno','LIKE',"%$nc%")->orderBy('id','ASC')->get();
        $alumno = Alumno::where('nc','LIKE',"%$nc%")->get();
        $docente = Docente::select('rfc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        $ncreditos=Acomplementaria::where('alumno','LIKE',"%$nc%")
                        ->sum(DB::raw('cast(creditos AS int)'));
        return view('acomplementarias.fragment.listarac',compact('acomplementarias','alumno','docente','ncreditos'));

    }

}
