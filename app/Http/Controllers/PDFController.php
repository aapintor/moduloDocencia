<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AComplementaria;
use App\Alumno;
use App\Puesto;
use App\Docente;
use App\Carrera;
use App\Materia;
use App\Grupo;
use App\CicloEsc;
use App\Titulacion;
use App\OpcionT;
use Carbon\Carbon;
use App\Http\Requests\AComplementariaRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{

	public function crearPDFAC($datos,$datos2,$datos3,$vistaurl,$nc,$carrera,$dsc,$doc,$esc,$nof)
    {
        $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        $data   = $datos;
        $data2  = $datos2;
        $data3  = $datos3;
        $data4  = $carrera;
        $data5  = $dsc;
        $data6  = $doc;
        $data7  = $esc;
        $date   = date('d')."/".$meses[date('m')-1]."/".date('Y') ;
        $view   = \View::make($vistaurl, compact('data', 'date','data2','data3','date','nc','data4','data5','data6','data7','nof'))->render();
        $pdf    = \App::make('snappy.pdf.wrapper');
        $pdf    ->loadHTML($view)->save('pdf/AC/'.$nc.'.pdf');
        return $pdf->stream(''.$nc.'.pdf');
    }

    public function crear_constancia_ac(Request $request,$nc){
        $input = $request->input('oficio');
        if (file_exists('pdf/AC/'.$nc.'.pdf')){ 
            return response()->file('pdf/AC/'.$nc.'.pdf', [
              'Content-Disposition' => 'inline; filename="'. $nc .'.pdf"'
            ]);
        }
        else{

            $vistaurl="pdfs.constancia_ac";
            $ac=Acomplementaria::select('actividad','creditos','fecha_del','fecha_al','calificacion')
                        ->where('alumno','LIKE',"%$nc%")->orderBy('fecha_del','ASC')->orderBy('fecha_al','ASC')->get();
            $nomb=Alumno::select(DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))
                        ->where('nc','LIKE',"%$nc%")->get();
            $sum=Acomplementaria::where('alumno','LIKE',"%$nc%")
                        ->sum(DB::raw('calificacion * cast(creditos AS int)'));
            $c=Alumno::select('carreras.nombre as nombre')->join('carreras','alumnos.carrera','=','carreras.id')
                            ->where('alumnos.nc','LIKE',"%$nc%")->get();
            
            $prom=(double)$sum/5;
            $dsc=Docente::select(DB::raw("CONCAT(docentes.nombre,' ',docentes.paterno,' ',docentes.materno) AS completo"),'docentes.grado','docentes.sexo AS sexo')->join('puestos','docentes.rfc','=','puestos.docente')->where('puestos.puesto','LIKE','%jefedepto%')->get();

            $doc=Docente::select(DB::raw("CONCAT(docentes.nombre,' ',docentes.paterno,' ',docentes.materno) AS completo"),'docentes.grado','docentes.sexo AS sexo')->join('puestos','docentes.rfc','=','puestos.docente')->where('puestos.puesto','LIKE','%jefedocencia%')->get();

            $esc=Docente::select(DB::raw("CONCAT(docentes.nombre,' ',docentes.paterno,' ',docentes.materno) AS completo"),'docentes.grado','docentes.sexo AS sexo')->join('puestos','docentes.rfc','=','puestos.docente')->where('puestos.puesto','LIKE','%jefeescolares%')->get();

            return $this->crearPDFAC($ac,$nomb,$prom, $vistaurl,$nc,$c,$dsc,$doc,$esc,$input);
        } 
    }


    public function crearPDFCE($alumno,$materia,$ciclo,$vistaurl,$carrera,$dsc,$nc,$nof)
    {
        $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        $data   = $alumno;
        $data2  = $materia;
        $data3  = $ciclo;
        $data4  = $carrera;
        $data5  = $dsc;
        $date   = date('d')."/".$meses[date('m')-1]."/".date('Y') ;
        $view   = \View::make($vistaurl, compact('data', 'date','data2','data3','data4','data5','nc','nof'))->render();
        $pdf    = \App::make('snappy.pdf.wrapper');
        $pdf    ->loadHTML($view)->save('pdf/Circulos/'.$nc.'.pdf');
        return $pdf->stream(''.$nc.'.pdf');
    }
 
    public function crear_constancia_ce(Request $request,$nc){
        $input = $request->input('oficio');
        if (file_exists('pdf/Circulos/'.$nc.'.pdf')){ 
            return response()->file('pdf/Circulos/'.$nc.'.pdf', [
              'Content-Disposition' => 'inline; filename="'. $nc .'.pdf"'
            ]);
        }
        else{

            $vistaurl="pdfs.constancia_ce";
            //$ac=Acomplementaria::select('actividad','creditos','fecha_del','fecha_al','calificacion')
            //          ->where('alumno','LIKE',"%$nc%")->orderBy('fecha_del','ASC')->orderBy('fecha_al','ASC')->get();
            $alumno=Alumno::select(DB::raw("CONCAT(paterno,' ',materno,' ',nombre) AS completo"))
                        ->where('nc','LIKE',"%$nc%")->get();

            $materia=Grupo::select('materias.nombre as nombre')->join('materias','grupos.materia','=','materias.id')
                            ->where('grupos.alumno','LIKE',"%$nc%")->get();

            $carrera=Alumno::select('carreras.nombre as nombre')->join('carreras','alumnos.carrera','=','carreras.id')
                            ->where('alumnos.nc','LIKE',"%$nc%")->get();

            $ciclo=Grupo::select(DB::raw("CONCAT(periodo,' ',anio) AS ciclo"))->join('ciclo_escs','grupos.ciclo','=','ciclo_escs.id')->where('grupos.alumno','LIKE',"%$nc%")->get();

            $dsc=Docente::select(DB::raw("CONCAT(docentes.nombre,' ',docentes.paterno,' ',docentes.materno) AS completo"),'docentes.grado','docentes.sexo AS sexo')->join('puestos','docentes.rfc','=','puestos.docente')->where('puestos.puesto','LIKE','%jefedepto%')->get();

            return $this->crearPDFCE($alumno,$materia,$ciclo,$vistaurl,$carrera,$dsc,$nc,$input);
        } 
    }

    public function crear_reporte_a(Request $request){
        $a1= $request->input('anio1');
        $a2= $request->input('anio2');
        if (file_exists('pdf/Reportes/'.$a1.'.pdf')){
            return response()->file('pdf/Reportes/'.$a1.'.pdf', [
              'Content-Disposition' => 'inline; filename="'.$a1.'.pdf"'
            ]);
        }
        else{

            $vistaurl="pdfs.reporte_a";
            $opc=OpcionT::select('id')->where('opcion','LIKE','%CENEVAL%');
            $ti1=Titulacion::select('titulacions.proyecto as proyecto','titulacions.asesor as asesor','titulacions.estatus as estatus', 'titulacions.created_at as created_at','titulacions.opc_titu as opc_titu')
                            ->join('opcion_ts as o', 'o.id','=','titulacions.opc_titu')
                            ->whereBetween('titulacions.created_at', [$a1."-01-01", $a1."-06-30"])
                            ->where('opcion','NOT LIKE','%CENEVAL%')
                            ->orderBy('titulacions.created_at','DESC')
                            ->get();
            $ti2=Titulacion::select('titulacions.proyecto as proyecto','titulacions.asesor as asesor','titulacions.estatus as estatus', 'titulacions.created_at as created_at')
                            ->join('opcion_ts as o', 'o.id','=','titulacions.opc_titu')
                            ->whereBetween('titulacions.created_at', [$a1."-08-01", $a1."-12-31"])
                            ->orderBy('titulacions.created_at','DESC')
                            ->get();
            $sum1=Titulacion::select('opcion',DB::raw('count(*) as total'),'opc_titu')->join('opcion_ts as o', 'o.id','=','titulacions.opc_titu')
                            ->whereBetween('titulacions.created_at', [$a1."-01-01", $a1."-06-30"])
                            ->where('o.opcion','NOT LIKE','%CENEVAL%')
                            ->groupBy('o.opcion','opc_titu')
                            ->get();
            $sum2=Titulacion::select('o.opcion',DB::raw('count(*) as total'),'opc_titu')->join('opcion_ts as o', 'o.id','=','titulacions.opc_titu')
                            ->whereBetween('titulacions.created_at', [$a1."-08-01", $a1."-12-31"])
                            ->where('o.opcion','NOT LIKE','%CENEVAL%')
                            ->groupBy('o.opcion','opc_titu')
                            ->get();
            //return $now->year;
            return $this->crearPDFRA($ti1,$a1,$ti2,$sum1,$sum2,$vistaurl);
        } 
    }

    public function crearPDFRA($ti1,$a1,$ti2,$sum1,$sum2,$vistaurl){
        $titu1=$ti1;
        $titu2=$ti2;
        $su1=$sum1;
        $su2=$sum2;
        $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        $date   = date('d')."/".$meses[date('m')-1]."/".date('Y') ;
        $view   = \View::make($vistaurl, compact('titu1','titu2', 'a1','su1','su2','date'))->render();
        $pdf    = \App::make('snappy.pdf.wrapper');
        $pdf    ->loadHTML($view)->save('pdf/Reportes/'.$a1.'.pdf');
        return $pdf->stream(''.$a1.'.pdf');
    }

    public function crear_reporte_d(Request $request){
        $asesor= $request->input('docente');
        $anio= $request->input('anio');
        $sem= $request->semestre;
        if (file_exists('pdf/Reportes/'.$asesor.' '.$anio.'.pdf')){
            return response()->file('pdf/Reportes/'.$asesor.' '.$anio.'.pdf', [
              'Content-Disposition' => 'inline; filename="'.$asesor.' '.$anio.'.pdf"'
            ]);
        }
        else{

            $vistaurl="pdfs.reporte_d";
            $nombrea=Docente::select(DB::raw("CONCAT(docentes.nombre,' ',docentes.paterno,' ',docentes.materno) AS completo"),'docentes.grado')
                            ->where('rfc','LIKE',"$asesor")->get();
            if($sem == 'E-J'){
                $ti=Titulacion::select('titulacions.proyecto as proyecto','titulacions.alumno as alumno','titulacions.plan as plan','titulacions.asesor as asesor','titulacions.estatus as estatus', 'titulacions.created_at as created_at','titulacions.opc_titu as opc_titu')
                                ->join('opcion_ts as o', 'o.id','=','titulacions.opc_titu')
                                ->whereBetween('titulacions.created_at', [$anio."-01-01", $anio."-06-30"])
                                ->where('opcion','NOT LIKE','%CENEVAL%')
                                ->where('asesor','LIKE',"%$asesor%")
                                ->orderBy('titulacions.created_at','DESC')
                                ->get();

                $sum=Titulacion::select('opcion',DB::raw('count(*) as total'),'opc_titu')->join('opcion_ts as o', 'o.id','=','titulacions.opc_titu')
                            ->whereBetween('titulacions.created_at', [$anio."-01-01", $anio."-06-30"])
                            ->where('o.opcion','NOT LIKE','%CENEVAL%')
                            ->where('asesor','LIKE',"%$asesor%")
                            ->groupBy('o.opcion','opc_titu')
                            ->get();
            }
            else{
                $ti=Titulacion::select('titulacions.proyecto as proyecto','titulacions.asesor as asesor','titulacions.estatus as estatus', 'titulacions.created_at as created_at','titulacions.opc_titu as opc_titu')
                                ->join('opcion_ts as o', 'o.id','=','titulacions.opc_titu')
                                ->whereBetween('titulacions.created_at', [$anio."-08-01", $anio."-12-31"])
                                ->where('opcion','NOT LIKE','%CENEVAL%')
                                ->where('asesor','LIKE',"%$asesor%")
                                ->orderBy('titulacions.created_at','DESC')
                                ->get();

                $sum=Titulacion::select('o.opcion',DB::raw('count(*) as total'),'opc_titu')->join('opcion_ts as o', 'o.id','=','titulacions.opc_titu')
                                ->whereBetween('titulacions.created_at', [$anio."-08-01", $anio."-12-31"])
                                ->where('o.opcion','NOT LIKE','%CENEVAL%')
                                ->where('asesor','LIKE',"%$asesor%")
                                ->groupBy('o.opcion','opc_titu')
                                ->get();
            }
            //return $nombrea;
            return $this->crearPDFRD($ti,$anio,$sem,$nombrea,$vistaurl,$sum,$asesor);
        } 
    }

    public function crearPDFRD($ti,$anio,$sem,$nombrea,$vistaurl,$sum,$asesor){
        $titu=$ti;
        $su=$sum;
        $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        $date   = date('d')."/".$meses[date('m')-1]."/".date('Y') ;
        $view   = \View::make($vistaurl, compact('titu', 'anio','sem','su','nombrea','date'))->render();
        $pdf    = \App::make('snappy.pdf.wrapper');
        $pdf    ->loadHTML($view)->save('pdf/Reportes/'.$asesor.' '.$anio.'.pdf');
        return $pdf->stream(''.$asesor.' '.$anio.'.pdf');
    }

    public function crear_lista_circulos(Request $request){
        $periodo = $request->semestre;
        $anio=Carbon::now()->year;

        $vistaurl="pdfs.lista_c";
        if($periodo == 'E-J'){
            $alumno=Grupo::select(DB::raw("CONCAT(a.paterno,' ',a.materno,' ',a.nombre) AS completo"))
                        ->join('alumnos as a','a.nc','=','grupos.alumno')
                        ->whereBetween('grupos.created_at', [$anio."-01-01", $anio."-06-30"])
                        ->get();
        }
        else{
            $alumno=Grupo::select(DB::raw("CONCAT(a.paterno,' ',a.materno,' ',a.nombre) AS completo"))
                        ->join('alumnos as a','a.nc','=','grupos.alumno')
                        ->whereBetween('grupos.created_at', [$anio."-08-01", $anio."-12-31"])
                        ->get();
        }
        //return $alumno;
        return $this->crearPDFLC($alumno,$vistaurl,$periodo,$anio);
    }

    public function crearPDFLC($alumno,$vistaurl,$periodo,$anio){
        $alu=$alumno;
        $view   = \View::make($vistaurl, compact('alu','periodo', 'anio'))->render();
        $pdf    = \App::make('snappy.pdf.wrapper');
        $pdf    ->loadHTML($view);
        return $pdf->stream('Horario-'.$periodo.' '.$anio.'.pdf');
    }

    public function crear_horario(Request $request){
        $periodo = $request->semestre;
        $anio=Carbon::now()->year;

        $vistaurl="pdfs.horario";
        if($periodo == 'E-J'){
            $horario=Grupo::select(DB::raw("CONCAT(a.paterno,' ',a.materno,' ',a.nombre) AS completo"),'m.nombre as materia','dia1','hora1','salon1','dia2','hora2','salon2')
                        ->join('alumnos as a','a.nc','=','grupos.alumno')
                        ->join('materias as m','m.id','=','grupos.materia')
                        ->whereBetween('grupos.created_at', [$anio."-01-01", $anio."-06-30"])
                        ->get();
        }
        else{
            $horario=Grupo::select(DB::raw("CONCAT(a.paterno,' ',a.materno,' ',a.nombre) AS completo"),'m.nombre as materia','dia1','hora1','salon1','dia2','hora2','salon2')
                        ->join('alumnos as a','a.nc','=','grupos.alumno')
                        ->join('materias as m','a.id','=','grupos.materia')
                        ->whereBetween('grupos.created_at', [$anio."-01-01", $anio."-06-30"])
                        ->get();
        }
        return $this->crearPDFH($horario,$vistaurl,$periodo,$anio);
    }

    public function crearPDFH($horario,$vistaurl,$periodo,$anio){
        $hor=$horario;
        $view   = \View::make($vistaurl, compact('hor','periodo', 'anio'))->render();
        $pdf    = \App::make('snappy.pdf.wrapper');
        $pdf    ->loadHTML($view);
        return $pdf->stream('Horario-'.$periodo.' '.$anio.'.pdf');
    }
}
