@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin.aside')
        <div class="col-md-4">
            Editar Usuario: {{$user->name}}
        </div>
        <div class="col-md-4">
            {!! Form::open(['route'=>['admin.usuarios.update',$user],'method'=>'PUT']) !!}
                <div class="row form-group">
                    <div class="col-sm-6">
                        {!! Form::checkbox('estado', null, $user->estado) !!} Activado <br>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
