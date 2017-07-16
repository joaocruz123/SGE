<?php

namespace App\Http\Controllers;

use App\CategoriasRenda;
use App\Renda;
use Illuminate\Http\Request;

class RendasController extends Controller
{
    public function index()
    {

        $rendas = Renda::with(['categoria_renda'])->get();

        return view('rendas.index', compact('rendas'));
    }

    public function create()
    {
        $categorias_rendas = CategoriasRenda::all();

        return view('rendas.create', compact('categorias_rendas'));
    }

    public function store(Request $request)
    {

        $renda = Renda::create($request->all());



        return redirect()->route('rendas.index');
    }

    public function edit($id)
    {

        $categorias_rendas = CategoriasRenda::all();

        $renda = Renda::findOrFail($id);

        return view('rendas.edit', compact('renda', 'categorias_rendas'));
    }


    public function update(Request $request, $id)
    {
        $renda = Renda::findOrFail($id);

        $renda->update($request->all());



        return redirect()->route('rendas.index');
    }


    /**
     * Display Expense.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $despesa = Despesa::findOrFail($id);

        return view('despesas.show', compact('despesa'));
    }


    /**
     * Remove Expense from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $despesa = Despesa::findOrFail($id);

        $despesa->delete();

        return redirect()->route('despesas.index');
    }
}
