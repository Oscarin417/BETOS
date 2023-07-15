@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Rol</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alter-danger" role="alter">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach($erros->all() as $e)
                                        <span class="badge badge-danger">{{$e}}</span>
                                    @endforeach
                                    <button class="close" type="button" data-dismis="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {!! Form::model($r, ['method'=>'PUT','route'=>['roles.update',$r->id]]) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol</label>
                                            {!! Form::text('name', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Permisos para este Rol</label>
                                            <br>
                                            @foreach($p as $p)
                                                <label>
                                                    {{ Form::checkbox('permission[]', $p->id, false, array('class'=>'name')) }}
                                                    {{$p->name}}
                                                </label>
                                                <br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-success" type="submit">Guardar</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
