<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';
    protected $primaryKey = 'id';
    protected $fillable = ['numero', 'tipo_id', 'estado'];

    public function tipohabitacion()
    {
        return $this->belongsTo(Tipo_Habitacion::class, 'tipo_id');
    }
}
