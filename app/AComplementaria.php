<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use App\Alumno;
class AComplementaria extends Model
{
    protected $fillable = [
        'alumno' , 'actividad' , 'creditos' , 'fecha_del' , 'fecha_al', 'horas' , 'calificacion', 'docente_resp',
    ];

    protected $primaryKey = 'id';

    public function scopeSearchAC($query,$s)
    {   
        $s= mb_strtoupper($s,'UTF-8');
    	return $query->join('alumnos','a_complementarias.alumno','=','alumnos.nc')
                    ->where('a_complementarias.alumno','LIKE',"%$s%")
                    ->orwhere(DB::raw("CONCAT(alumnos.nombre,' ',alumnos.paterno,' ',alumnos.materno)"), 'LIKE', "%$s%");
    }

    
}
