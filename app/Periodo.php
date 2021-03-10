<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    public function materia()
    {
    return $this->hasMany(Materia::class);
    }
    
    protected $table = 'periodo';
    protected $primarykey = 'PER_CODIGO';
    public $timestamps = false;
}
