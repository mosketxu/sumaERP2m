<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pu extends Model
{
    use SoftDeletes;

    protected $fillable = ['empresa_id', 'name', 'ce', 'us', 'pu', 'observaciones'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

}
