<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['departamento'];

    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }

}
