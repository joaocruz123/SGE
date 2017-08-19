<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Matricula;
use App\Professor;
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

        return view('home', compact('totalMatriculas','totalAlunos', 'totalProfessor'));
    }
}
