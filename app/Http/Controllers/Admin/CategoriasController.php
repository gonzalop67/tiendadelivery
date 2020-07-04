<?php

namespace App\Http\Controllers\Admin;

use App\Categorias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::all();

        return view("admin.categorias.index", compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categorias.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $categoria->delete();

        return redirect()->route('admin.categorias.index');
    }
}
