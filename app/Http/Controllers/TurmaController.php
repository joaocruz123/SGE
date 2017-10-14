<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Turma;
use Illuminate\Http\Request;
use Infinety\Alerts\AlertServiceProvider;

class TurmaController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$turmas = Turma::orderBy('id', 'desc')->paginate(10);

		return view('turmas.index', compact('turmas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('turmas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$turma = new Turma();

		$turma->nome = $request->input("nome");

		$turma->save();

		return redirect()->route('turmas.index')->with(alert()->success('A turma foi Criada','Turma adicionada a lista de turmas!'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$turma = Turma::findOrFail($id);

		return view('turmas.show', compact('turma'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$turma = Turma::findOrFail($id);

		return view('turmas.edit', compact('turma'));
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
		$turma = Turma::findOrFail($id);

		$turma->nome = $request->input("nome");

		$turma->save();

		return redirect()->route('turmas.index')->with(alert()->success('Turma Editada', 'O nome da turma foi alterado.'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$turma = Turma::findOrFail($id);

        $turma->delete();

		return redirect()->route('turmas.index')->with(alert()->error('Turma Deletada', 'Turma deletada da lista.'));
	}

}
