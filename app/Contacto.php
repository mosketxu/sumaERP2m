<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Contacto
 *
 * @property int $id
 * @property int $empresa_id
 * @property int $departamento_id
 * @property int $facturacion
 * @property string $nombre
 * @property string|null $apellidos
 * @property string|null $avatar
 * @property string|null $telefono1
 * @property string|null $email1
 * @property string|null $telefono2
 * @property string|null $email2
 * @property string|null $observaciones
 * @property int $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereApellidos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereDepartamentoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereEmail1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereEmail2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereEmpresaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereFacturacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereTelefono1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereTelefono2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    public function condicionPagos()
    {
        return $this->hasMany(CondicionPagos::class);
    }
    public function periodoPagos()
    {
        return $this->hasMany(PeriodoPagos::class);
    }

}
