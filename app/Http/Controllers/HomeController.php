<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Cordenador;
use App\Despesa;
use App\Matricula;
use App\Professor;
use App\Renda;
use App\Studant;
use App\User;
use ConsoleTVs\Charts\Charts;
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
    public function index()
    {
        $totalCordenador = Cordenador::count();
        $totalAlunos = Studant::count();
        $totalProfessor = Professor::count();
        $totalUsuarios = User::count();

        $rendas = Renda::with(['categoria_renda'])->orderBy('id','desc')->take(4)->get();

        $despesas = Despesa::with(['categoria_despesa'])->orderBy('id','desc')->take(4)->get();



        /*$matriculas = Matricula::with(['aluno', 'turma'])->orderBy('id','desc')->take(3)->get();*/

        $chart = Charts::database(Renda::all(),'line', 'highcharts')
            // Use this if you want to use your own template
            ->setTitle('Receitas dos Ultimos 6 mêses')
            ->setElementLabel("Total")
            ->setResponsive(true)
            ->groupByMonth('2017', true);

        return view('home', compact('totalCordenador','totalAlunos', 'totalProfessor', 'totalUsuarios', 'rendas', 'despesas','chart'));
    }

}
