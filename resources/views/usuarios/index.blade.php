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
                            <a class="btn btn-outline-primary" href="{{route('usuarios.create')}}">Nuevo</a>
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th class="display: none;">ID</th>
                                            <th class="text-white">Nombre</th>
                                            <th class="text-white">E-mail</th>
                                            <th class="text-white">Rol</th>
                                            <th class="text-white">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($u as $u)
                                            <tr>
                                                <td class="text-white">{{$u->id}}</td>
                                                <td class="text-white">{{$u->name}}</td>
                                                <td class="text-white">{{$u->email}}</td>
                                                <td class="text-white">
                                                    @if(!empty($u->getRoleNames()))
                                                        @foreach($u->getRoleNames() as $rn)
                                                            <h5><span class="badge badge-dark">{{$rn}}</span></h5>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('usuarios.edit',$u->id)}}" class="btn btn-outline-warning">Editar</a>
                                                        {!! Form::open(['method'=> 'DELETE', 'route'=> ['usuarios.destroy', $u->id]]) !!}
                                                            {!! Form::submit('Borrar', ['class'=> 'btn btn-outline-danger']) !!}
                                                        {!! Form::close() !!}
                                                    </div>
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

