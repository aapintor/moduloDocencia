<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = [
        'jefedsc' ,'jefedocencia','presidente_acad', 'subdirector_acad', 'jefe_div_prof',
    ];
    protected $primaryKey = 'id';
}
