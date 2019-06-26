<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'nombre_producto','ap_producto','slug_producto'
    ];

    //para el slug

    public function getRouteKeyName()
    {
        return 'slug_producto';
    }

    public function cursos()
    {
        return $this->hasMany('App\Cursos');
    }
}
