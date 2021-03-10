<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    public function materia()
    {
    return $this->hasMany(Materia::class);
    }
    protected $table = 'control';
    protected $primarykey = 'CON_CODIGO';
    public $timestamps = false;
}

