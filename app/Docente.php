<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    public function materia()
    {
    return $this->hasMany(Materia::class);
    }
    protected $table = 'docente';
    protected $primarykey = 'DOC_CODIGO';
    public $timestamps = false;
}
