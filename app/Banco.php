<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
