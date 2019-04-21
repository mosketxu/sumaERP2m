<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Banco;


class Empresa extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'name', 'tipoempresa_id', 'direccion',
    'codpostal', 'localidad', 'provincia_id', 'pais_id',
    'cifnif', 'tfno', 'email', 'web', 'idioma', 'cuentacontable',
    'marta', 'susana', 'observaciones', 'estado'
  ];

  public static function boot()
  {
    parent::boot();

    static::saving(function (Empresa $empresa) {
      if (!\App::runningInConsole()) {
        $empresa->slug = str_slug($empresa->name, "-");
      }
    });
  }

  public function scopeSearch($query, $busca)
  {
    return $query->where('name', 'LIKE', "%$busca%")->orWhere('cifnif', 'LIKE', "%$busca%");
  }

  public function tipoempresa()
  {
    return $this->belongsTo(TipoEmpresa::class);
  }

  public function provincia()
  {
    return $this->belongsTo(Provincia::class);
  }
  
  public function pais()
  {
    return $this->belongsTo(Pais::class);
  }

  public function userempresa()
  {
    return $this->hasMany(UserEmpresa::class);
  }

  public function bancos()
  {
    return $this->hasMany(Banco::class);
  }

  public function condFacturacions()
  {
    return $this->hasOne(CondicionFacturacion::class);
  }

  public function contactos()
  {
    return $this->hasMany(Contacto::class);
  }

  public function pus()
  {
    return $this->hasMany(Pu::class);
  }
}
