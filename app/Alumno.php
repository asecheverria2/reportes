<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    
    public function nota()
    {
    return $this->hasMany(Nota::class);
    }
}
