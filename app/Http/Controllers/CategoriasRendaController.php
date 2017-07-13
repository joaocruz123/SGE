<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CategoriasRenda;
use Illuminate\Http\Request;

class CategoriasRendaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias_rendas = CategoriasRenda::orderBy('id', 'desc')->paginate(10);

		return view('categorias_rendas.index', compact('categorias_rendas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categorias_rendas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$categorias_renda = new CategoriasRenda();

		$categorias_renda->nome = $request->input("nome");

		$categorias_renda->save();

		return redirect()->route('categorias_rendas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categorias_renda = CategoriasRenda::findOrFail($id);

		return view('categorias_rendas.show', compact('categorias_renda'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categorias_renda = CategoriasRenda::findOrFail($id);

		return view('categorias_rendas.edit', compact('categorias_renda'));
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
		$categorias_renda = CategoriasRenda::findOrFail($id);

		$categorias_renda->nome = $request->input("nome");

		$categorias_renda->save();

		return redirect()->route('categorias_rendas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categorias_renda = CategoriasRenda::findOrFail($id);
		$categorias_renda->delete();

		return redirect()->route('categorias_rendas.index')->with('message', 'Item deleted successfully.');
	}

}
