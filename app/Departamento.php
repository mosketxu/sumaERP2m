<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Departamento
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Departamento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Departamento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Departamento whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Departamento whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Departamento extends Model
{
    protected $fillable = ['departamento'];

    public function contactos()
    {
        return $this->belongsTo(Contacto::class);
    }

}
