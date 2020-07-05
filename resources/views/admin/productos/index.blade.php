@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin.aside')
        <div class="col-md-8">
            <a class="btn btn-info" href="{{route('admin.productos.create')}}">Nuevo</a>
            @if (count($productos) > 0)
                <table class="table mt-2">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($productos as $r)
                            <tr>
                                <td>{{$r->id}}</td>
                                <td>{{$r->nombre}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('admin.productos.edit', $r->id)}}">Editar</a>
                                    {!! Form::open(['method'=>'DELETE','route'=>['admin.productos.destroy',$r->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('ELIMINAR', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay registros.</p>
            @endif
        </div>
    </div>
</div>
@endsection
