@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Productos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-producto')
                                <a class="btn btn-outline-primary" href="{{route('productos.create')}}">
                                    <i class="fas fa-plus"></i>
                                </a>
                            @endcan
                            <table class="table table-dark table-striped">
                                <thead>
                                    <th class="text-white">ID</th>
                                    <th class="text-white">Nombre</th>
                                    <th class="text-white">Descripcion</th>
                                    <th class="text-white">Precio</th>
                                    <th class="text-white">Imagen</th>
                                    <th class="text-white">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($productos as $producto)
                                        <tr>
                                            <td class="text-white">{{$producto->id}}</td>
                                            <td class="text-white">{{$producto->nombre}}</td>
                                            <td class="text-white">{{$producto->descripcion}}</td>
                                            <td class="text-white">${{$producto->precio}}</td>
                                            <td class="text-white">
                                                <img src="{{asset('storage/'.$producto->imagen)}}" alt="{{$producto->nombre}}" class="img-thumbnail" width="80">
                                            </td>
                                            <td class="text-white">
                                                <form action="{{route('productos.destroy',$producto->id)}}" method="POST" class="formulario-eliminar">
                                                    @can('editar-producto')
                                                        <a href="{{route('productos.edit',$producto->id)}}" class="btn btn-outline-warning">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-producto')
                                                        <button type="submit" class="btn btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-contend-end">
                                {!! $productos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
