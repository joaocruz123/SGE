<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Http\Requests;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $alunos = Aluno::all();
        return view('aluno.index',['alunos' => $alunos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aluno.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'idade' => 'required',
            'sexo' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
        ]);

        $aluno = new Aluno;
        $aluno->nome = $request->nome;
        $aluno->idade = $request->idade;
        $aluno->sexo = $request->sexo;
        $aluno->endereco = $request->endereco;
        $aluno->telefone = $request->telefone;
        $aluno->save();
        return redirect('aluno')->with('message', 'Aluno atualizado com sucesso!');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::find($id);
        if(!$aluno){
            abort(404);
        }
        return view('aluno.details')->with('aluno', $aluno);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id);
        if(!$aluno){
            abort(404);
        }
        return view('aluno.edit')->with('alunodetalhe', $aluno);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'idade' => 'required',
            'sexo' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
        ]);

        $aluno = Aluno::find($id);
        $aluno->nome = $request->nome;
        $aluno->idade = $request->idade;
        $aluno->sexo = $request->sexo;
        $aluno->endereco = $request->endereco;
        $aluno->telefone = $request->telefone;
        $aluno->save();
        return redirect('aluno')->with('message', 'Aluno editado com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $aluno = Aluno::find($id);
         $aluno->delete();
         return redirect('aluno')->with('message', 'Aluno apagado com sucesso!');

    }
}
