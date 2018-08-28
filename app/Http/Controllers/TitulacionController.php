<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Titulacion;
use App\Alumno;
use App\Docente;
use App\Plan;
use App\OpcionT;
use App\Http\Requests\TitulacionRequest;
use Illuminate\Support\Facades\DB;

class TitulacionController extends Controller
{
    public function index(Request $request)
    {
        $alumnos= Titulacion::BT($request->busqueda)->orderBy('paterno','ASC')->paginate();
        return view('titulacions.index',compact('alumnos'));
    }

    public function create()
    {   
        $alumno=Alumno::select('nc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        $docente=Docente::select('rfc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        $plan=Plan::select('nombre','id')->get();
        $opcion=OpcionT::select('opcion','id')->get();
    	return view('titulacions.create', compact('alumno','docente','plan','opcion'));
    }

    public function store(TitulacionRequest $request)
    {
        $titulacion = new Titulacion;
        $titulacion->alumno        = $request->alumno;
        $titulacion->proyecto      = mb_strtoupper($request->proyecto,'UTF-8');
        $titulacion->plan          = $request->plan;
        $titulacion->opc_titu      = $request->opc_titu;
        $titulacion->asesor        = $request->asesor;
        $titulacion->sinodal1      = $request->sinodal1;
        $titulacion->sinodal2      = $request->sinodal2;
        $titulacion->sinodal3      = $request->sinodal3;
        $titulacion->estatus       = "ACTIVO";
        $titulacion->fecha_cer     = "";
        $titulacion->lugar         = "";
        $titulacion->hora          = "";

        $titulacion->save();

        return redirect()->route('titulacions.index');
    }

    public function edit($id)
    {
        $titulacion  = Titulacion::find($id);
        $alumno=Alumno::select('nc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        $docente=Docente::select('rfc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        $plan=Plan::select('nombre','id')->get();
        $opcion=OpcionT::select('opcion','id')->get();
        return view('titulacions.edit', compact('titulacion','alumno','docente','plan','opcion'));
    }

    public function update(TitulacionRequest $request, $id)
    {
        $titulacion = Titulacion::find($id);
        $titulacion->alumno        = $request->alumno;
        $titulacion->proyecto      = mb_strtoupper($request->proyecto,'UTF-8');
        $titulacion->plan          = $request->plan;
        $titulacion->opc_titu      = $request->opc_titu;
        $titulacion->asesor        = $request->asesor;
        $titulacion->sinodal1      = $request->sinodal1;
        $titulacion->sinodal2      = $request->sinodal2;
        $titulacion->sinodal3      = $request->sinodal3;
        $titulacion->fecha_cer     = "";
        $titulacion->lugar         = "";
        $titulacion->hora          = "";

        $titulacion->save();
        return redirect()->route('titulacions.index');
    }

    public function detalles_titu($nc){
        $titulacion= Titulacion::select('titulacions.id','titulacions.proyecto',DB::raw("CONCAT(a.grado,' ',a.paterno,' ',a.materno,' ',a.nombre) AS asesor"),DB::raw("CONCAT(s1.grado,' ',s1.paterno,' ',s1.materno,' ',s1.nombre) AS sinodal1"),DB::raw("CONCAT(s2.grado,' ',s2.paterno,' ',s2.materno,' ',s2.nombre) AS sinodal2"),DB::raw("CONCAT(s3.grado,' ',s3.paterno,' ',s3.materno,' ',s3.nombre) AS sinodal3"),'op.opcion')
                        ->join('docentes as a','a.rfc','=','titulacions.asesor')
                        ->join('docentes as s1','s1.rfc','=','titulacions.sinodal1')
                        ->join('docentes as s2','s2.rfc','=','titulacions.sinodal2')
                        ->join('docentes as s3','s3.rfc','=','titulacions.sinodal3')
                        ->join('opcion_ts as op','op.id','=','titulacions.opc_titu')
                        ->where('titulacions.alumno','LIKE',"%$nc%")
                        ->get();
        //$titulacion= Titulacion::select('id','proyecto')->where('titulacions.alumno','LIKE',"%$nc%")
        //            ->get();
        $alumno = Alumno::where('nc','LIKE',"%$nc%")->get();
        $opcion = OpcionT::select('opcion_ts.opcion')
                    ->join('titulacions','opcion_ts.id','=','titulacions.opc_titu')
                    ->where('titulacions.alumno','LIKE',"%$nc%")->get();
        $asesor = Docente::select(DB::raw("CONCAT(grado,' ',paterno,' ',materno,' ',nombre) AS asesor"))
                    ->join('titulacions','docentes.rfc','=','titulacions.asesor')
                    ->where('titulacions.alumno','LIKE',"%$nc%")->get();

        $sinodal1 = Docente::select(DB::raw("CONCAT(grado,' ',paterno,' ',materno,' ',nombre) AS sinodal1"))
                    ->join('titulacions','docentes.rfc','=','titulacions.sinodal1')
                    ->where('titulacions.alumno','LIKE',"%$nc%")->get();

        $sinodal2 = Docente::select(DB::raw("CONCAT(grado,' ',paterno,' ',materno,' ',nombre) AS sinodal2"))
                    ->join('titulacions','docentes.rfc','=','titulacions.sinodal2')
                    ->where('titulacions.alumno','LIKE',"%$nc%")->get();

        $sinodal3 = Docente::select(DB::raw("CONCAT(grado,' ',paterno,' ',materno,' ',nombre) AS sinodal3"))
                    ->join('titulacions','docentes.rfc','=','titulacions.sinodal3')
                    ->where('titulacions.alumno','LIKE',"%$nc%")->get();
        $info= $titulacion.$opcion.$asesor.$sinodal1.$sinodal2.$sinodal3;
        //return $titulacion;
        return view('titulacions.fragment.detallestitu',compact('titulacion','alumno'));

    }

    public function gen_reporte_a(){
        return view('titulacions.fragment.gen_reporte_a');
    }

    public function gen_reporte_d(){
        $docente=Docente::select('rfc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        return view('titulacions.fragment.gen_reporte_d',compact('docente'));
    }
}
