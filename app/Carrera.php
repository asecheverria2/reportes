<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public function materia()
    {
    return $this->hasMany(Materia::class);
    }
    protected $table = 'carrera';
    protected $primarykey = 'CAR_CODIGO';
    public $timestamps = false;
}
