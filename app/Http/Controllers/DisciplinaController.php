<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
//use TomLingham\Searchy\Facades\Searchy;

class DisciplinaController extends Controller {


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
        $disciplinas = Disciplina::orderBy('id', 'desc')->paginate(10);

		return view('disciplinas.index', compact('disciplinas'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('disciplinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $disciplina = new Disciplina();

        $disciplina->nome = $request->input("nome");
        $disciplina->area_conhecimento = $request->input("area_conhecimento");

        $disciplina->save();

        return redirect()->route('disciplinas.index')->with( alert()->success('Aluno Criado', 'Aluno criao e adicionado a grade de alunos!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $disciplina = Disciplina::findOrFail($id);

        return view('disciplinas.show', compact('disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $disciplina = Disciplina::findOrFail($id);

        return view('disciplinas.edit', compact('disciplina'));
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
        $disciplina = Disciplina::findOrFail($id);

        $disciplina->nome = $request->input("nome");
        $disciplina->area_conhecimento = $request->input("area_conhecimento");

        $disciplina->save();

        return redirect()->route('disciplinas.index')->with(alert()->success('Aluno Editado', 'Todos os dados foram atualizados!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->delete();

        return redirect()->route('disciplinas.index')->with(alert()->error('Aluno Deletado', 'O aluno foi deletado da lista.'));
    }

}
