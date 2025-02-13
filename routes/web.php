<?php

use App\Models\Habitacion;
use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use App\Models\Reserva;
use App\Models\Pago;
use App\Models\Tipo_Habitacion;
use App\Models\Cliente;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', function(){
    $usuario = Usuario::all();
    return $usuario;
});

Route::get('/reservas', function(){
    $reserva = Reserva::all();
    return $reserva;
});

Route::get('/pagos', function(){
    $pago = Pago::all();
    return $pago;
});

Route::get('/habitaciones', function(){
    $habitacion = Habitacion::all();
    return $habitacion;
});

Route::get('/tipohab', function(){
    $tipo_habitacion = Tipo_Habitacion::all();
    return $tipo_habitacion;
});

Route::get('/clientes', function(){
    $cliente = Cliente::all();
    return $cliente;
});