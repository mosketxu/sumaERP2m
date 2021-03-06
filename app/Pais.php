<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Pais
 *
 * @property int $id
 * @property string $c3
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pais whereC3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pais whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pais whereName($value)
 * @mixin \Eloquent
 */
class Pais extends Model
{
    public $incrementing = false;
    // protected $primarykey='id'; no hace falta porque la clave ya es id
    public function paisempresa()
    {
        return $this->hasMany(Empresa::class);
    }
}
