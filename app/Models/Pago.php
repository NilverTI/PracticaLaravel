<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $primaryKey = 'id';
    protected $fillable = ['monto', 'reserva_id','metodo_pago', 'estado'];
    
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }
}
