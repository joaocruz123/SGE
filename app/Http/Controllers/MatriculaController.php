<?php
namespace App\Http\Controllers;
    use App\Matricula;
    use App\Aluno;
    use App\Turma;
    use Illuminate\Http\Request;
class MatriculaController extends Controller{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $turma_id = $request->get('turma');

        $perPage = 20;

        if (!empty($turma_id)) {
            $matriculas = Matricula::with('turma')
                ->where('turma_id', '=', $turma_id)
                ->paginate($perPage);
        }
        else
        {
            $matriculas = Matricula::with(['aluno', 'turma'])->get();
        }
        $turmas=Turma::all();

        return view('matriculas.index', compact('matriculas', 'turmas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = Aluno::all();
        $turmas = Turma::all();

        return view('matriculas.create', compact('alunos', 'turmas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matricula = new Matricula();

        $matricula->aluno_id = $request->aluno;
        $matricula->turma_id = $request->turma;
        $matricula->save();

        return redirect()->route('matriculas.index')->with('message', 'Matricula realizada com sucesso.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $filme)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        $alunos = Aluno::all();
        $turmas = Turma::all();

        return view('matriculas.edit', compact('matricula', 'alunos', 'turmas'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {

        $matricula->aluno_id = $request->aluno;
        $matricula->turma_id = $request->turma;
        $matricula->save();

        return redirect('/matriculas');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        $matricula->delete();

        return redirect('/matriculas');
    }
}
