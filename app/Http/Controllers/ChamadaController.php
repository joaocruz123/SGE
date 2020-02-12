<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Chamada;
use App\Chamada_aluno;
use App\Studant;
use App\Turma;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Infinety\Alerts\AlertServiceProvider;

class ChamadaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $turmas = Turma::all();
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $chamadas = Chamada::where('datachamada', 'LIKE', "%$keyword%")
                ->with('turma')
                ->paginate($perPage);
        } else {
            $chamadas = Chamada::with('turma')->paginate($perPage);
        }

        return view('chamadas.index', compact('chamadas', 'turmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $turmas = Turma::all();

        return view('chamadas.create', compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $chamada = new Chamada();

        $chamada->datachamada = $request->datachamada;
        $chamada->turma_id = $request->turma;
        $chamada->realizada = 0;
        $chamada->visitantes = $request->visitantes;
        $chamada->biblias = $request->biblias;
        $chamada->revistas = $request->revistas;

        $chamada->save();

        return redirect()->route('chamadas.index')->with( alert()->success('Chamada criada','A frequência já pode ser feita!'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $chamada_aluno = Chamada_aluno::all();

        $chamada = Chamada::findOrFail($id);

        $alunos = Studant::where('turma_id', $chamada->turma->id)->get();


        return view('chamadas.show', compact('chamada','alunos', 'chamada_aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $chamada = Chamada::findOrFail($id);

        $turmas = Turma::all();

        return view('chamadas.edit', compact('chamada','turmas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

        $chamada = Aluno::findOrFail($id);

        $chamada->datachamada = $request->datachamada;
        $chamada->turma_id = $request->turma;
        $chamada->visitantes = $request->visitantes;
        $chamada->biblias = $request->biblias;
        $chamada->revistas = $request->revistas;

        $chamada->save();

        return redirect()->route('chamadas.index')->with(alert()->success('Chamada Editada', 'Todos os dados foram atualizados!'));

    }

    /**
     * Remove the specified resource from storage.

     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $chamada = Chamada::findOrFail($id);

        $chamada->delete();

        return redirect()->route('chamadas.index')->with(alert()->error('Chamada Deletada', 'Todos os dados foram apagados!'));
    }

    public function frequencia($id){

        $chamada = Chamada::findOrFail($id);

        $presencas = Chamada_aluno::where('chamada_id',$chamada->id)->get();

        $alunos = Studant::where('turma_id', $chamada->turma->id)->get();

        return view('chamadas.fazer_chamada', compact('chamada','alunos', 'presencas'));
    }

    public function fazer_chamada( $id, Request $request ){

        $data = $request->all();

        $alunos = Studant::where('turma_id', $data['turma_id'][0])->get();

        foreach($alunos as $aluno){

            $chamada_aluno = Chamada_aluno::where(['aluno_id'=>$aluno->id, 'chamada_id'=>$id])->first();

            if(isset($chamada_aluno)){
                $chamada_aluno = Chamada_aluno::find($chamada_aluno->id);
                $chamada_aluno->presenca = 0;
                $chamada_aluno->save();
            }else{
                Chamada_aluno::create(['aluno_id'=>$aluno->id, 'presenca'=>0, 'chamada_id'=>$id]);
            }

        }
        if(isset($data['presenca'])){
            foreach($data['presenca'] as $aluno => $presenca) {
                $chamada_aluno = Chamada_aluno::where(['aluno_id'=>$aluno, 'chamada_id'=>$id])->first();
                if(isset($chamada_aluno)){
                    $chamada_aluno = Chamada_aluno::find($chamada_aluno->id);
                    $chamada_aluno->presenca = 1;
                    $chamada_aluno->save();
                }
            }
        }

        $chamada = Chamada::find($id);

        $chamada->realizada = 1;

        $chamada->save();

        return redirect('chamadas')->with(alert()->success('Chamada Realizada', 'A pesença e ausencia dos alunos foi registrado!'));
    }
}
