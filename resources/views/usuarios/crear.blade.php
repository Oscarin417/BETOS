@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alte de Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alter-danger" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach($errors->all() as $e)
                                        <span class="badge badge-danger">{{$e}}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismis="alert" aria-label="Close">
                                        <span arai-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {!! Form::open(array('route'=> 'usuarios.store', 'method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            {!! Form::text('name', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            {!! Form::text('email', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            {!! Form::password('password', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="confirm-password">ConfirmarPassword</label>
                                            {!! Form::password('confirm-password', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Roles</label>
                                            {!! Form::select('roles[]', $r,[], array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-outline-success">Guardar</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

