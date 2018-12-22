<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Banco;
/**
 * App\Empresa
 *
 * @property int $id
 * @property int $tipoempresa_id
 * @property string|null $direccion
 * @property string|null $codpostal
 * @property string|null $localidad
 * @property int|null $provincia_id
 * @property string|null $pais_id
 * @property string|null $cifnif
 * @property string|null $email
 * @property string|null $web
 * @property string $idioma
 * @property string|null $cuentacontable
 * @property int $marta
 * @property int $susana
 * @property int $estado
 * @property string|null $observaciones
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereCifnif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereCodpostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereCuentacontable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereIdioma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereLocalidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereMarta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa wherePaisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereProvinciaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereSusana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereTipoempresaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Empresa whereWeb($value)
 * @mixin \Eloquent
 */
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

  public function tipoempresa()
  {
    return $this->belongsTo(TipoEmpresa::class);
  }

  public function bancos()
  {
    return $this->hasMany(Banco::class);
  }

  public function condFacturacions()
  {
    return $this->hasMany(CondicionFacturacion::class);
  }

  public function contactos()
  {
    return $this->hasMany(Contacto::class);
  }

  public function pus()
  {
    return $this->hasMany(Pu::class);
  }

  public function users()
  {
    return $this->hasMany(User::class);
  }

}
