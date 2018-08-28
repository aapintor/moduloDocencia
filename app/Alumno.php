<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class Alumno extends Model
{
    protected $fillable = [
        'nombre' , 'paterno' , 'materno' , 'nc' , 'carrera', 'pestudios' , 'email', 'cel' , 'calle' , 'col' , 'num',
    ];

    protected $primaryKey = 'nc';

    public $incrementing = false;

    public function scopeSearchA($query,$s)
    {   
        $s= mb_strtoupper($s,'UTF-8');
    	return $query->where(DB::raw("CONCAT(nombre,' ',paterno,' ',materno)"), 'LIKE', "%$s%")
                    ->orWhere('nc', 'LIKE', "%$s%");
    }
}
