<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Despesa;
use App\Matricula;
use App\Professor;
use App\Renda;
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
        $totalMatriculas = Matricula::count();
        $totalAlunos = Aluno::count();
        $totalProfessor = Professor::count();

        $rendas = Renda::with(['categoria_renda'])->orderBy('id','desc')->take(4)->get();

        $despesas = Despesa::with(['categoria_despesa'])->orderBy('id','desc')->take(4)->get();



        /*$matriculas = Matricula::with(['aluno', 'turma'])->orderBy('id','desc')->take(3)->get();*/

        $chart = Charts::database(Despesa::all(),'pie', 'highcharts')
            // Use this if you want to use your own template
            ->setTitle('My nice chart')
            ->setElementLabel("Total")
            ->setResponsive(true)
            ->lastByMonth(6, true);

        return view('home', compact('totalMatriculas','totalAlunos', 'totalProfessor', 'rendas', 'despesas','chart'));
    }

}
