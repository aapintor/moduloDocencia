<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class CicloEsc extends Model
{
    protected $fillable = [
        'periodo' , 'anio',
    ];

    protected $primaryKey = 'id';

    public function scopeSearchCE($query,$s)
    {   
        $s= mb_strtoupper($s,'UTF-8');
    	return $query->where(DB::raw("CONCAT(periodo,' ',anio)"), 'LIKE', "%$s%");
    }
}
