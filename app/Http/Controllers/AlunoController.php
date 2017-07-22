<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
	{
        $keyword =$request->get('search');
        $perPage =10;

        if(!empty($keyword)){
            $alunos = Aluno::where('nome','LIKE',"%$keyword%")
                ->orWhere('endereco', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        }else{
            $alunos = Aluno::orderBy('nome', 'asc')->paginate($perPage);
        }

		return view('alunos.index', compact('alunos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('alunos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$aluno = new Aluno();

		$aluno->nome = $request->input("nome");
        $aluno->cpf = $request->input("cpf");
        $aluno->sexo = $request->input("sexo");
        $aluno->endereco = $request->input("endereco");
        $aluno->idade = $request->input("idade");
        $aluno->telefone = $request->input("telefone");

		$aluno->save();

		return redirect()->route('alunos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$aluno = Aluno::findOrFail($id);

		return view('alunos.show', compact('aluno'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$aluno = Aluno::findOrFail($id);

		return view('alunos.edit', compact('aluno'));
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
		$aluno = Aluno::findOrFail($id);

		$aluno->nome = $request->input("nome");
        $aluno->cpf = $request->input("cpf");
        $aluno->sexo = $request->input("sexo");
        $aluno->endereco = $request->input("endereco");
        $aluno->idade = $request->input("idade");
        $aluno->telefone = $request->input("telefone");

		$aluno->save();

		return redirect()->route('alunos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$aluno = Aluno::findOrFail($id);
		$aluno->delete();

		return redirect()->route('alunos.index')->with('message', 'Item deleted successfully.');
	}

}
