@extends('layouts.plantilla')
    @section('contenido')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                @lang('main.categories') <a href="{{route('categorias.create')}}" class="btn btn-success">@lang('main.new')</a>
            </div>
            <div class="card-body">
                @if(Session::has('mensaje'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{Session::get('mensaje')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{Session::get('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="{{route('categorias.index')}}" method="get">
                    <div class="input-group">
                        <input name="texto" type="text" class="form-control" value="{{$texto}}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>                      
                        </div>
                    </div>
                </form>
                <div class="row mt-3">
                    <div class="col-lg-12 table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registros as $reg)
                                <tr>
                                    <td>
                                        <a href="{{route('categorias.edit',$reg->id)}}" class="btn btn-warning btn-sm">@lang('main.edit')</a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-eliminar-{{$reg->id}}">@lang('main.delete')</button>
                                    </td>
                                    <td>{{$reg->id}}</td>
                                    <td>{{$reg->nombre}}</td>
                                </tr>
                                @include('categoria.delete')
                                @endforeach                        
                            </tbody>
                        </table>
                    {{$registros->appends(["texto" => $texto])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

