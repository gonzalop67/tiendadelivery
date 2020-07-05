@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin.aside')
        <div class="col-md-8">
            @if (count($pedidos) > 0)
                <table class="table mt-2">
                    <thead>
                        <th>Id</th>
                        <th>Código</th>
                        <th>Fecha Pedido</th>
                        <th>Entregado</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $r)
                            <tr>
                                <td>{{$r->id}}</td>
                                <td>{{$r->codigo}}</td>
                                <td>{{$r->created_at}}</td>
                                <td>{{$r->estado?'Sí':'No'}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{route('admin.pedidos.show', $r->id)}}">Ver Detalle</a>
                                    @if (!$r->estado)
                                        <a class="btn btn-danger" href="{{route('admin.pedidos.edit', $r->id)}}">Entregar</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay pedidos.</p>
            @endif
        </div>
    </div>
</div>
@endsection
