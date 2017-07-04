<?php namespace App\Http\Controllers;

use App\Aluno;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Matricula;
use App\Turma;
use Illuminate\Http\Request;

class MatriculaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $matriculas = Matricula::with("aluno")->with("turma")->get();

        return view('matriculas.index', compact('matriculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $aluno = Aluno::pluck("nome", "id")->prepend('Selecione', null);
        $turma = Turma::pluck("nome", "id")->prepend('Selecione', null);


        return view('matriculas.create', compact("aluno", "turma"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Matricula::create($request->all());

        return redirect()->route('matriculas.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $matricula = Matricula::findOrFail($id);

        return view('matriculas.show', compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $matricula = Matricula::find($id);

        $aluno = Aluno::pluck("nome", "id")->prepend('Selecione', null);
        $turma = Turma::pluck("nome", "id")->prepend('Selecione', null);


        return view('matriculas.edit', compact('matricula', "aluno", "turma"));

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

        $matricula = Matricula::findOrFail($id);



        $matricula->save();

        return redirect()->route('matriculas.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();

        return redirect()->route('matriculas.index')->with('message', 'Item deleted successfully.');
    }

}
