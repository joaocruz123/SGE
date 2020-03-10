<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Chamada;
use App\Cordenador;
use App\Despesa;
use App\Matricula;
use App\Professor;
use App\Renda;
use App\Studant;
use App\Turma;
use App\User;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $totalTurmas = Turma::count();
        $totalAlunos = Studant::count();
        $totalProfessor = Professor::count();
        $totalUsuarios = User::count();

        
        //Notificação de Bem-vindo
        //smilify('success', 'Seja bem vindo ao Sistema de Gestão de Escola Bíblica use o menu lateral para acessar as opções do sistema!');

        $rendas = Renda::with(['categoria_renda'])->orderBy('id','desc')->take(4)->get();

        $despesas = Despesa::with(['categoria_despesa'])->orderBy('id','desc')->take(4)->get();



        /*$matriculas = Matricula::with(['aluno', 'turma'])->orderBy('id','desc')->take(3)->get();*/
        $chart=Charts::multiDatabase('line', 'highcharts')
            ->title('Receitas e Despesas dos ultimos 6 mêses')
            ->colors(['#0000ff','#ff0000'])
            ->elementLabel("Total")
            ->dataset('Rendas', Renda::all())
            ->dataset('Despesas', Despesa::all())
            ->lastByMonth(6, true);

        $chamadas= Chamada::all()->take(4);

        $turmas = Turma::all();
        $user= User::all();
        
        return view('home', compact('totalTurmas','totalAlunos', 'totalProfessor', 'totalUsuarios', 'rendas', 'despesas','chart', 'chamadas', 'turmas','user'));
    }

}
