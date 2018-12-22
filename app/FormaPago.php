<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    public function condFacturacion()
    {
        return $this->hasMany(CondicionFacturacion::class);
    }
}
