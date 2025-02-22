<?php

use Illuminate\Support\Facades\Route;
use App\Models\Categoria;
use App\Models\Producto;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;



//Rutas públicas
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/', function () {
    return view('welcome');
});

 //Rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('categorias',CategoriaController::class);
    Route::resource('productos',ProductoController::class);

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});
/*
route::get('categorias', function(){
    return Categoria::paginate(10); //Select * from categorias
});

route::get('productos', function(){
    //return Producto::all();
    return Producto::with('categoria')->get();
});

Route::get('categoria/create',function(){
    $categoria = new Categoria();
    $categoria->nombre='Lácteos';
    $categoria->save();
    return $categoria;
});
*/
/*
Route::get('/uss',function(){
    return view('inicio');
});

Route::get('/productos', function(){
    return view('almacen.producto');
});

Route::get('/usuario', function(){
    $nombre="Juan Carlos";
    return "Hola Usuario {$nombre}";
});

Route::get('/noticia/{titulo}', function($titulo){
    return "Este es la noticia {$titulo}";
});

Route::group(['prefix'=> 'administrador'], function (){
    Route::get('/noticia', function(){
        return "noticia";
    });
    Route::get('/evento', function(){
        return "evento";
    });
    Route::get('/laboral', function(){
        return "laboral";
    });
});

route::get('zona', function(){
    return env('APP_TIMEZONE');
});

route::get('locale', function (){
    return config('app.locale');
});
*/