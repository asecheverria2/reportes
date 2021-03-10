<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Materia extends Model
{
    
    
    public function nota()
    {
    return $this->hasMany(Nota::class);
    }
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
    protected $table = 'materia';
    protected $primarykey = 'MAT_CODIGO';
    public $timestamps = false;
}

