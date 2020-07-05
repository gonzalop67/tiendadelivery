@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin.aside')
        <div class="col-md-6">
            {!! Form::open(['route'=>['admin.productos.store'],'method'=>'POST','files'=>true]) !!}
                <div class="row form-group">
                    {!! Form::label('slug', 'SLUG') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('title', 'title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('description', 'description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('nombre', 'nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('descripcion', 'descripcion') !!}
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('precio', 'Precio') !!}
                    {!! Form::text('precio', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('stock', 'Stock') !!}
                    {!! Form::text('stock', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('unidad', 'Unidad') !!}
                    {!! Form::text('unidad', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('orden', 'Orden') !!}
                    {!! Form::text('orden', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::checkbox('estado', null) !!}
                    {!! Form::label('estado', 'Activo', ['class' => 'ml-2']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::file('urlfoto') !!}
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'descripcion' );
</script>
@endsection
