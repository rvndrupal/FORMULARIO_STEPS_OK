<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'nombre_producto','ap_producto'
    ];

    public function cursos()
    {
        return $this->hasMany('App\Cursos');
    }
}
