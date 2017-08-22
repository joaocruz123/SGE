<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cordenador;
use Illuminate\Http\Request;

class CordenadorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cordenadors = Cordenador::orderBy('id', 'desc')->paginate(10);

		return view('cordenadors.index', compact('cordenadors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cordenadors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$cordenador = new Cordenador();

		$cordenador->nome = $request->input("nome");
        $cordenador->idade = $request->input("idade");
        $cordenador->sexo = $request->input("sexo");
        $cordenador->endereco = $request->input("endereco");
        $cordenador->telefone = $request->input("telefone");

		$cordenador->save();

		return redirect()->route('cordenadors.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cordenador = Cordenador::findOrFail($id);

		return view('cordenadors.show', compact('cordenador'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cordenador = Cordenador::findOrFail($id);

		return view('cordenadors.edit', compact('cordenador'));
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
		$cordenador = Cordenador::findOrFail($id);

		$cordenador->nome = $request->input("nome");
        $cordenador->idade = $request->input("idade");
        $cordenador->sexo = $request->input("sexo");
        $cordenador->endereco = $request->input("endereco");
        $cordenador->telefone = $request->input("telefone");

		$cordenador->save();

		return redirect()->route('cordenadors.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cordenador = Cordenador::findOrFail($id);
		$cordenador->delete();

		return redirect()->route('cordenadors.index')->with('message', 'Item deleted successfully.');
	}

}
