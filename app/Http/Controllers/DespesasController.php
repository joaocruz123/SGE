<?php

namespace App\Http\Controllers;

use App\CategoriasDespesa;
use Illuminate\Http\Request;
use App\Despesa;

class DespesasController extends Controller
{
    public function index()
    {

        $despesas = Despesa::with(['categoria_despesa'])->get();

        return view('despesas.index', compact('despesas'));
    }

    public function create()
    {
        $categorias_despesas = CategoriasDespesa::all();

        return view('despesas.create', compact('categorias_despesas'));
    }

    public function store(Request $request)
    {

        $despesa = Despesa::create($request->all());



        return redirect()->route('despesas.index');
    }

    public function edit($id)
    {

        $categorias_despesas = CategoriasDespesa::all();

        $despesa = Despesa::findOrFail($id);

        return view('despesas.edit', compact('despesa', 'categorias_despesas'));
    }


    public function update(Request $request, $id)
    {
        $despesa = Despesa::findOrFail($id);

        $despesa->update($request->all());



        return redirect()->route('despesas.index');
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
