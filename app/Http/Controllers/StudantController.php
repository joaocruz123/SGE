<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Studant;
use App\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \PDF;
use TomLingham\Searchy\Facades\Searchy;

class StudantController extends Controller {


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
            $studants = Studant::where('nome','LIKE',"$keyword%")
                ->orWhere('endereco', 'LIKE', "$keyword%")
                ->paginate($perPage);
        }else{
            $studants = Studant::orderBy('nome', 'asc')->paginate($perPage);
        }

        $turmas=Turma::all();

        return view('studants.index', compact('studants', 'turmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $turmas = Turma::all();

        return view('studants.create', compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $studant = new Studant();

        $studant->nome = $request->input("nome");
        $studant->cpf = $request->input("cpf");
        $studant->sexo = $request->input("sexo");
        $studant->endereco = $request->input("endereco");
        $studant->matricula = 101 . $request->input("cpf"). 2017 ;
        $studant->idade = $request->input("idade");
        $studant->telefone = $request->input("telefone");
        $studant->turma_id = $request->turma;


        $studant->save();

        return redirect()->route('studants.index')->with( alert()->success('Aluno Criado', 'Aluno criao e adicionado a grade de alunos!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $studant = Studant::findOrFail($id);

        $turmas = Turma::all();

        return view('studants.show', compact('studant', 'turmas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $studant = Studant::findOrFail($id);
        $turmas = Turma::all();

        return view('studants.edit', compact('studant', 'turmas'));
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
        $studant = Studant::findOrFail($id);

        $studant->nome = $request->input("nome");
        $studant->cpf = $request->input("cpf");
        $studant->sexo = $request->input("sexo");
        $studant->endereco = $request->input("endereco");
        $studant->matricula = $request->input("cpf"."created_at");
        $studant->idade = $request->input("idade");
        $studant->telefone = $request->input("telefone");
        $studant->turma_id = $request->turma;

        $studant->save();

        return redirect()->route('studants.index')->with(alert()->success('Aluno Editado', 'Todos os dados foram atualizados!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $studant = Studant::findOrFail($id);
        $studant->delete();

        return redirect()->route('studants.index')->with(alert()->error('Aluno Deletado', 'O aluno foi deletado da lista.'));
    }

    public function relatorioAluno(){
        $turmas = Turma::all();

        $studants = Studant::orderBy('nome', 'asc')->get();

        return view('relatorios.aluno_relatorio', compact('studants', 'turmas'));
    }

    public function gerarPdf(Request $request){

        $keyword = $request->get('search');

        $turmas = Turma::all();

        if (!empty($keyword)) {
            $studants = Studant::where('nome', 'LIKE', "$keyword%")
                ->orWhere('matricula', 'LIKE', "$keyword%")
                ->orWhere('created_at', 'LIKE', "%$keyword%")
                ->orderBy('nome', 'asc')
                ->get();
        }
        else
        {
            $studants = Studant::orderBy('nome', 'asc')->get();
        }

        if(count($studants)==0){

            Session::flash('flash_message', 'Nenhum Aluno na lista de impressão!');

            return redirect('studants');
        }

        /*$pdf = app('snappy.pdf.wrapper');

        $pdf->loadView('alunos.pdf', compact('alunos') );

        return $pdf->download(md5( date('Y-m-d H:i:s') ).'.pdf');*/

        $pdf = PDF::loadView('studants.pdf', compact('studants','turmas'));

        return $pdf->stream(md5( date('Y-m-d H:i:s') ).'.pdf');

    }

}
