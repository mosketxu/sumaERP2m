<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Banco
 *
 * @property int $id
 * @property int $empresa_id
 * @property string $bank_id
 * @property string $iban
 * @property int $principal
 * @property string|null $observaciones
 * @property int $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banco whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banco whereEmpresaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banco whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banco whereIban($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banco whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banco whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banco wherePrincipal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Banco whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Banco extends Model
{
    use SoftDeletes;

    protected $fillable = ['empresa_id', 'bank_id', 'iban', 'principal', 'observaciones', 'estado'];
    protected $dates = ['deleted_at'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function banco()
    {
        return $this->belongsTo(Bank::class);
    }
}
