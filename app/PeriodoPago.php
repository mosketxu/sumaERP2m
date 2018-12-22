<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoPago extends Model
{
    public function condFacturacion()
    {
        return $this->hasMany(CondicionFacturacion::class);
    }

}
