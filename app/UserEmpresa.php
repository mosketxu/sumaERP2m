<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEmpresa extends Model
{
    protected $fillable = [
        'user_id', 'empresa_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
