<?php

namespace App\Http\Controllers\Admin;

use App\Categorias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();

        return view("admin.categorias.index", compact('categorias'));
    }

    public function create()
    {
        return view("admin.categorias.create");
    }

    public function store(Request $request)
    {
        $categoria = new Categorias($request->all());
        if ($request->hasFile('urlfoto')) {
            $urlfoto = $request->file('urlfoto');
            $ruta = public_path('/img/categorias/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(), $ruta);
            $categoria->urlfoto = $request->file('urlfoto')->getClientOriginalName();
        }
        if ($request->portada) {
            $categoria->portada = 1;
        } else {
            $categoria->portada = 0;
        }
        $categoria->save();

        return redirect()->route('admin.categorias.index');
    }

    public function edit($id)
    {
        $categoria = Categorias::whereId($id)->first();

        return view("admin.categorias.edit", compact('categoria'));
    }

    public function show($id)
    {
        Session::put('categorias_id', $id);

        return redirect('/admin/subcategorias');
    }

    public function update(Request $request, $id)
    {
        $categoria = Categorias::findOrFail($id);

        $categoria->fill($request->all());

        if ($request->hasFile('urlfoto')) {
            $urlfoto = $request->file('urlfoto');
            $ruta = public_path('/img/categorias/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(), $ruta);
            $categoria->urlfoto = $request->file('urlfoto')->getClientOriginalName();
        }
        if ($request->portada) {
            $categoria->portada = 1;
        } else {
            $categoria->portada = 0;
        }
        $categoria->save();

        return redirect()->route('admin.categorias.index');
    }

    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);
        if (file_exists(public_path('/img/categorias/'.$categoria->urlfoto)))
            unlink(public_path('/img/categorias/'.$categoria->urlfoto));
        $categoria->delete();

        return redirect()->route('admin.categorias.index');
    }
}
