<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'empresa_id', 'departamento_id', 'esfacturacion',
        'name', 'lastname', 'avatar', 'email1', 'telefono1', 'email2', 'telefono2',
        'observaciones', 'estado'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function (Contacto $contacto) {
            if (!\App::runningInConsole()) {
                $contacto->slug = str_slug($contacto->name . " " . $contacto->lastname, "-");
            }
        });
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function departamentos()
    {
        return $this->hasMany(Departamentos::class);
    }

    public function condicionPagos()
    {
        return $this->hasMany(CondicionPagos::class);
    }
    public function periodoPagos()
    {
        return $this->hasMany(PeriodoPagos::class);
    }
}
