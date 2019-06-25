<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = [
        'nombre_curso','descripcion_curso'
    ];



    public function producto()
    {
        return $this->belongsTo('App\Products');
    }
}
