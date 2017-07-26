<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CategoriasDespesa;
use Illuminate\Http\Request;

class CategoriasDespesaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$categorias_despesas = CategoriasDespesa::orderBy('id', 'desc')->paginate(10);

		return view('categorias_despesas.index', compact('categorias_despesas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categorias_despesas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$categorias_despesa = new CategoriasDespesa();

		$categorias_despesa->nome = $request->input("nome");

		$categorias_despesa->save();

		return redirect()->route('categorias_despesas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categorias_despesa = CategoriasDespesa::findOrFail($id);

		return view('categorias_despesas.show', compact('categorias_despesa'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categorias_despesa = CategoriasDespesa::findOrFail($id);

		return view('categorias_despesas.edit', compact('categorias_despesa'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$categorias_despesa = CategoriasDespesa::findOrFail($id);

		$categorias_despesa->nome = $request->input("nome");

		$categorias_despesa->save();

		return redirect()->route('categorias_despesas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categorias_despesa = CategoriasDespesa::findOrFail($id);

        $categorias_despesa->delete();

		return redirect()->route('categorias_despesas.index')->with('message', 'Item deleted successfully.');
	}

}
