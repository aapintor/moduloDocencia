<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use App\Alumno;
class Grupo extends Model
{
	protected $fillable = [
        'alumno' ,
    ];

    protected $primaryKey = 'id';

    public function scopeBG($query,$s)
    {   
        $s= mb_strtoupper($s,'UTF-8');
    	return $query->join('alumnos','grupos.alumno','=','alumnos.nc')
    				->join('materias','grupos.materia', '=','materias.id')
    				->join('ciclo_escs','grupos.ciclo','=','ciclo_escs.id')
                    ->where('grupos.alumno','LIKE',"%$s%")
                    ->orwhere(DB::raw("CONCAT(alumnos.nombre,' ',alumnos.paterno,' ',alumnos.materno)"), 'LIKE', "%$s%");
    }
}
