@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-outline-primary" href="{{route('usuarios.create')}}">
                                <i class="fa fa-solid fa-plus"></i>
                            </a>
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-white">ID</th>
                                        <th class="text-white">Nombre</th>
                                        <th class="text-white">E-mail</th>
                                        <th class="text-white">Rol</th>
                                        <th class="text-white">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td class="text-white">{{$usuario->id}}</td>
                                            <td class="text-white">{{$usuario->name}}</td>
                                            <td class="text-white">{{$usuario->email}}</td>
                                            <td class="text-white">
                                                @if(!empty($usuario->getRoleNames()))
                                                    @foreach($usuario->getRoleNames() as $rolName)
                                                        <h5><span>{{$rolName}}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-white">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-outline-warning" href="{{route('usuarios.edit',$usuario->id)}}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    {!! Form::open(['method'=> 'DELETE', 'route'=>['usuarios.destroy',$usuario->id]]) !!}
                                                        {!! Form::button('<i class="fas fa-trash"></i>',['type'=>'submit','class'=>'btn btn-outline-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-cotent-end">
                                {!! $usuarios->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection