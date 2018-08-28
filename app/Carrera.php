<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class Carrera extends Model
{
    protected $fillable = [
        'nombre' ,
    ];

    protected $primaryKey = 'id';

    public function scopeSearch($query,$s)
    {   
        $s= mb_strtoupper($s,'UTF-8');
    	return $query->where('nombre', 'LIKE', "%$s%");
    }
}
