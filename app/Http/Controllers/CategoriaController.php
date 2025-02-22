<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //ORM Eloquent
        $texto=$request->get('texto');
        $registros=Categoria::where('nombre','LIKE','%'.$texto.'%')->orderBy('id','desc')->paginate(10);
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
        /*
        $validatedData = $request->validate([
            'nombre' => 'required|min:3|max:50',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre no puede tener más de 50 caracteres.',
        ]);
        */
        $registro=new Categoria();
        $registro->nombre=$request->input('nombre');
        $registro->save();
        return redirect()->route('categorias.index')->with('mensaje','Registro '.$registro->nombre.' agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return "Este es el método Show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $registro=Categoria::findOrFail($id);
        return view('categoria.edit',compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, $id)
    {
            $registro=Categoria::findOrFail($id);
            $registro->nombre=$request->input('nombre');
            $registro->save();
            return redirect()->route('categorias.index')->with('mensaje','Registro '.$registro->nombre.' actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy ($id)
    {
        try {
            $registro=Categoria::findOrFail($id);
            $registro->delete();
            return redirect()->route('categorias.index')->with('mensaje','Registro '.$registro->nombre.' eliminado correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('categorias.index')->with('error','No se puede eliminar el registro '.$registro->nombre.' porque esta siendo usado.');
        }
    }
}
