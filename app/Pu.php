<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Pu
 *
 * @property int $id
 * @property int $empresa_id
 * @property string $name
 * @property string $ce
 * @property string $us
 * @property string $pw
 * @property string $observaciones
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pu whereCe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pu whereEmpresaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pu whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pu wherePw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pu whereUs($value)
 * @mixin \Eloquent
 */
class Pu extends Model
{
    use SoftDeletes;

    protected $fillable = ['empresa_id', 'name', 'ce', 'us', 'pw', 'observaciones'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

}
