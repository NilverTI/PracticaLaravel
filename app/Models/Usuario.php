<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'email', 'contraseña', 'telefono', 'rol'];
    protected $hidden = ['contraseña'];
}
