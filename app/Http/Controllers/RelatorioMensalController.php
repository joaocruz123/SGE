<?php

namespace App\Http\Controllers;

use App\Despesa;
use App\Renda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RelatorioMensalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $r)
    {
        $from = Carbon::parse(sprintf(
            '%s-%s-01',
            $r->query('y', Carbon::now()->year),
            $r->query('m', Carbon::now()->month)
        ));
        $to      = clone $from;
        $to->day = $to->daysInMonth;

        $des_q = Despesa::with('categoria_despesa')
            ->whereBetween('data', [$from, $to]);

        $ren_q = Renda::with('categoria_renda')
            ->whereBetween('data', [$from, $to]);

        $exp_total = $des_q->sum('valor');
        $inc_total = $ren_q->sum('valor');
        $exp_group = $des_q->orderBy('valor', 'desc')->get()->groupBy('categoria_despesa_id');
        $inc_group = $ren_q->orderBy('valor', 'desc')->get()->groupBy('categoria_renda_id');
        $profit    = $inc_total - $exp_total;

        $exp_summary = [];
        foreach ($exp_group as $exp) {
            foreach ($exp as $line) {
                if (! isset($exp_summary[$line->categoria_despesa->nome])) {
                    $exp_summary[$line->categoria_despesa->nome] = [
                        'nome'   => $line->categoria_despesa->nome,
                        'valor' => 0,
                    ];
                }
                $exp_summary[$line->categoria_despesa->nome]['valor'] += $line->valor;
            }
        }

        $inc_summary = [];
        foreach ($inc_group as $inc) {
            foreach ($inc as $line) {
                if (! isset($inc_summary[$line->categoria_renda->nome])) {
                    $inc_summary[$line->categoria_renda->nome] = [
                        'nome'   => $line->categoria_renda->nome,
                        'valor' => 0,
                    ];
                }
                $inc_summary[$line->categoria_renda->nome]['valor'] += $line->valor;
            }
        }

        return view('relatorio_mensal.index', compact('exp_summary', 'inc_summary', 'exp_total', 'inc_total', 'profit', 'm'));
    }
}
