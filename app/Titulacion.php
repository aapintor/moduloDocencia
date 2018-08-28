<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use App\Alumno;
use App\Titulacion;

class Titulacion extends Model
{

	protected $fillable = [
        'alumno' , 'plan' , 'opc_titu' , 'asesor' , 'sinodal1', 'sinodal2' , 'sinodal3', 'Proyecto',
    ];

    protected $primaryKey = 'id';

    public function scopeBT($query,$s)
    {   
        $s= mb_strtoupper($s,'UTF-8');
    	return $query->join('alumnos','titulacions.alumno','=','alumnos.nc')
                    ->where('titulacions.alumno','LIKE',"%$s%")
                    ->orwhere(DB::raw("CONCAT(alumnos.nombre,' ',alumnos.paterno,' ',alumnos.materno)"), 'LIKE', "%$s%");
    }
}
