@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('admin.aside')
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Activado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($data as $r)
                        <tr>
                            <td>{{$r->id}}</td>
                            <td>{{$r->name}}</td>
                            <td>{{$r->email}}</td>
                            <td>{{$r->estado?'Sí':'No'}}</td>
                            <td>
                                <a class="btn btn-info" href="">Pedidos</a>
                                <a class="btn btn-warning" href="{{route('admin.usuarios.edit', $r->id)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
