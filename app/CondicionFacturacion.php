<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CondicionFacturacion extends Model
{
  protected $fillable = ['name', 'empresa_id', 'diafactura', 'diavencimiento', 'condicionpago_id', 'periodopago_id'];

  public function empresa()
  {
    // return $this->belongsTo(Empresa::class)->select('id', 'name');
    return $this->belongsTo(Empresa::class);
  }

  public function formaPagos()
  {
    return $this->belongsTo(FormaPago::class);
  }

  public function periodoPagos()
  {
    return $this->belongsTo(PeriodoPago::class);
  }

}
