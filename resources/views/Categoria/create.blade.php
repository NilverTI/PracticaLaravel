@extends('layouts.plantilla')
    @section('contenido')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                Nueva Categoría
            </div>
            <div class="card-body">                
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                    <form method="post" action="{{route('categorias.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nombre">Ingrese nombre</label>
                                <input class="form-control" type="text" name="nombre" required>
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <button class="btn btn-secondary" type="reset">Cancelar</button>
                                <a href="{{route('categorias.index')}}">Regresar</a>
                            </div>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection