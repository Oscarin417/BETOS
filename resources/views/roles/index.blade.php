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
                                <a class="btn btn-outline-primary" href="{{route('roles.create')}}">
                                    <i class="fas fa-plus"></i>
                                </a>
                            @endcan
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-white">Rol</th>
                                        <th class="text-white">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td class="text-white">{{$role->name}}</td>
                                            <td class="text-white">
                                                @can('editar-rol')
                                                    <a class="btn btn-outline-warning" href="{{route('roles.edit',$role->id)}}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                @endcan

                                                @can('borrar-rol')
                                                    {!! Form::open(['method'=>'DELETE','route'=>['roles.destroy',$role->id]]) !!}
                                                        {!! Form::button('<i class="fas fa-trash"></i>',['type'=>'submit','class'=>'btn btn-outline-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection