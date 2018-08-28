<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
class Docente extends Model
{
    protected $fillable = [
        'nombre' , 'paterno' , 'materno' , 'rfc' , 'grado' , 'email', 'sexo' , 'depto' , 'inv' , 'desc',
    ];

    protected $primaryKey = 'rfc';

    public $incrementing = false;

    public function scopeSearchD($query,$s)
    {   
        $s= mb_strtoupper($s,'UTF-8');
    	return $query->where(DB::raw("CONCAT(nombre,' ',paterno,' ',materno)"), 'LIKE', "%$s%")
                    ->orwhere(DB::raw("CONCAT(paterno,' ',materno,' ',nombre)"), 'LIKE', "%$s%")
                    ->orWhere('rfc', 'LIKE', "%$s%");
    }
}