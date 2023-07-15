@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-rol')
                                <a class="btn btn-outline-primary" href="{{route('roles.create')}}">Nuevo</a>
                            @endcan
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-white">Rol</th>
                                        <th class="text-white">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($r as $r)
                                        <tr>
                                            <td class="text-white">{{$r->name}}</td>
                                            <td>
                                                @can('editar-rol')
                                                    <a class="btn btn-outline-warning" href="{{route('roles.edit', $r->id)}}">Editar</a>
                                                @endcan
                                                @can('borrar-rol')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $r->id], 'style'=>'display:inline']) !!}
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
