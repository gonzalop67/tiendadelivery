@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin.aside')
        <div class="col-md-6">
            {!! Form::open(['route'=>['admin.categorias.update', $categoria],'method'=>'PUT','files'=>true]) !!}
                <div class="row form-group">
                    {!! Form::label('slug', 'SLUG') !!}
                    {!! Form::text('slug', $categoria->slug, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('title', 'title') !!}
                    {!! Form::text('title', $categoria->title, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('description', 'description') !!}
                    {!! Form::text('description', $categoria->description, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('nombre', 'nombre') !!}
                    {!! Form::text('nombre', $categoria->nombre, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    {!! Form::label('descripcion', 'descripcion') !!}
                    {!! Form::textarea('descripcion', $categoria->descripcion, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    <img src="/img/categorias/{{$categoria->urlfoto}}">
                    {!! Form::file('urlfoto') !!}
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        {!! Form::checkbox('portada', null, $categoria->portada) !!} Portada <br>
                    </div>
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
