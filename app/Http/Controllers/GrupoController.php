<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Alumno;
use App\Materia;
use App\CicloEsc;
use App\Http\Requests\GrupoRequest;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function index(Request $request)
    {
        $grupos= Grupo::BG($request->busqueda)->orderBy('ciclo','ASC')->paginate();
        return view('grupos.index',compact('grupos'));
    }

    public function create()
    {   
        $alumno=Alumno::select('nc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        $materia=Materia::select('id','nombre')->get();
        $cicloesc=CicloEsc::select('id',DB::raw("CONCAT(periodo,' ',anio) AS ciclo"))->orderBy('ciclo')->get();
    	return view('grupos.create', compact('alumno','materia','cicloesc'));
    }

    public function store(GrupoRequest $request)
    {
    	$grupo = new Grupo;
    	$grupo->alumno  	= $request->alumno;
    	$grupo->materia   	= $request->materia;
    	$grupo->ciclo  		= $request->ciclo;
        $grupo->dia1        = $request->dia1;
        $grupo->hora1       = $request->hora1;
        $grupo->salon1      = mb_strtoupper($request->salon1,'UTF-8');
        $grupo->dia2        = $request->dia2;
        $grupo->hora2       = $request->hora2;
        $grupo->salon2      = mb_strtoupper($request->salon2,'UTF-8');

        $grupo->save();

    	return redirect()->route('grupos.index');
    					 #->with('info','El producto fue actualizado');
    }

    public function edit($id)
    {
        $grupo  = Grupo::find($id);
        $alumno=Alumno::select('nc',DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))->orderBy('paterno')->get();
        $materia=Materia::select('id','nombre')->get();
        $cicloesc=CicloEsc::select('id',DB::raw("CONCAT(periodo,' ',anio) AS ciclo"))->orderBy('ciclo')->get();
        return view('grupos.edit', compact('grupo','alumno','materia','cicloesc'));
    }

    public function update(grupoRequest $request, $id)
    {
        $grupo = Grupo::find($id);
        $grupo->alumno  	= $request->alumno;
    	$grupo->materia   	= $request->materia;
    	$grupo->ciclo  		= $request->ciclo;
        $grupo->dia1        = $request->dia1;
        $grupo->hora1       = $request->hora1;
        $grupo->salon1      = $request->salon1;
        $grupo->dia2        = $request->dia2;
        $grupo->hora2       = $request->hora2;
        $grupo->salon2      = $request->salon2;

        $grupo->save();
        return redirect()->route('grupos.index');
    }

    public function listar_grupo($nc){
        $grupos= Grupo::select('grupos.alumno','grupos.id','materias.nombre','ciclo_escs.periodo','ciclo_escs.anio','grupos.dia1','grupos.hora1','grupos.salon1','grupos.dia2','grupos.hora2','grupos.salon2')->join('alumnos','grupos.alumno','=','alumnos.nc')
                    ->join('materias','grupos.materia', '=','materias.id')
                    ->join('ciclo_escs','grupos.ciclo','=','ciclo_escs.id')
                    ->where('grupos.alumno','LIKE',"%$nc%")
                    ->orwhere(DB::raw("CONCAT(alumnos.nombre,' ',alumnos.paterno,' ',alumnos.materno)"), 'LIKE', "%$nc%")
                    ->get();
        $alumno = Alumno::where('nc','LIKE',"%$nc%")->get();
        return view('grupos.fragment.listargrupo',compact('grupos','alumno'));

    }

    public function gen_lista_c(){
        return view('grupos.fragment.gen_lista_c');

    }

    public function gen_horario(){
        return view('grupos.fragment.gen_horario');

    }
}
