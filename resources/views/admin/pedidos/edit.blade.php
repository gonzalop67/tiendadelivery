@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin.aside')
        <div class="col-md-6">
            {!! Form::open(['route'=>['admin.pedidos.update', $pedido],'method'=>'PUT']) !!}
                <div class="row form-group">
                    {!! Form::label('codigo', 'Código') !!}
                    {!! Form::text('codigo', $pedido->codigo, ['class' => 'form-control']) !!}
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        {!! Form::checkbox('estado', null, $pedido->estado) !!} Entregado <br>
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
@endsection
