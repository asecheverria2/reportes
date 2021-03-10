<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
    protected $table = 'guia';
    protected $primarykey = 'GUI_CODIGO';
    public $timestamps = false;
}
