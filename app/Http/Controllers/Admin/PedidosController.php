<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedidos::all();
        return view("admin.pedidos.index", compact('pedidos'));
    }

    public function edit($id)
    {
        $pedido = Pedidos::whereId($id)->first();
        return view("admin.pedidos.edit", compact('pedido'));
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedidos::findOrFail($id);
        //$pedido->fill($request->all());
        if ($request->estado) {
            $pedido->estado = 1;
        } else {
            $pedido->estado = 0;
        }
        $pedido->save();
        return redirect()->route('admin.pedidos.index');
    }
}
