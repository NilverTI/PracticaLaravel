<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = $request->get('texto');

        $registros = Categoria::where('nombre','LIKE','%'.$texto.'%')->orWhere('id','LIKE','%'.$texto.'%')->orderBy('id','desc')->paginate(10);
        return view('categoria.index', compact(['registros','texto']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        $registro = new Categoria();
        $registro->nombre = $request->input('nombre');
        $registro->save();

        return redirect()->route('categorias.index')->with('mensaje','Nuevo Registro '.$registro->nombre.' agerado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $registro = Categoria::findOrFail($id);
        return view('categoria.edit', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, $id)
    {
        $registro = Categoria::findOrFail($id);
        $registro->nombre = $request->input('nombre');
        $registro->save();

        return redirect()->route('categorias.index')->with('mensaje','Registro '.$registro->nombre.' actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $registro = Categoria::findOrFail($id);
            $registro->delete();
            return redirect()->route('categorias.index')->with('mensaje','Registro '.$registro->nombre.' eliminado con exito');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('categorias.index')->with('error','Error al eliminar el registro porque esta siendo usado');
        }
    }
}
