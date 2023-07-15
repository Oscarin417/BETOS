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
                            @can('crear-rol')
                                <a class="btn btn-outline-primary" href="{{route('productos.create')}}">Nuevo</a>
                            @endcan
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-white">Nombre</th>
                                        <th class="text-white">Descripcion</th>
                                        <th class="text-white">Precio</th>
                                        <th class="text-white">Imagen</th>
                                        <th class="text-white">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($p as $p)
                                        <tr>
                                            <td class="text-white">{{$p->nombre}}</td>
                                            <td class="text-white">{{$p->descripcion}}</td>
                                            <td class="text-white">${{$p->precio}}</td>
                                            <td class="text-white">
                                                <img src="{{$p->image}}" alt="auto">
                                            </td>
                                            <td>
                                                @can('editar-producto')
                                                    <a class="btn btn-outline-warning" href="{{route('productos.edit', $r->id)}}">Editar</a>
                                                @endcan
                                                @can('borrar-rol')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['productos.destroy', $r->id], 'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Borrar', ['class'=> 'btn btn-outline-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
