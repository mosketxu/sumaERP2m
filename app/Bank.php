<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Bank
 *
 */
class Bank extends Model
{
    use SoftDeletes;

    protected $fillable = ['bank'];
    protected $dates = ['deleted_at'];

    public function banco()
    {
        return $this->hasMany()(Banco::class);
    }
}
