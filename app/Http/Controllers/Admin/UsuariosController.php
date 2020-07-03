<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $data = User::whereTipo(0)->get();

        return view('admin.usuarios.index', compact('data'));
    }

    public function edit($id)
    {
        $user = User::whereId($id)->first();

        return view('admin.usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::whereId($id)->first();
        if ($request->estado) {
            $user->estado = 1;
        } else {
            $user->estado = 0;
        }
        $user->save();

        return redirect()->route('admin.usuarios.index');
    }
}
