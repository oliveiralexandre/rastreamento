<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensalidade;
use Illuminate\Support\Facades\DB;

class FinanceiroController extends Controller
{
    public function index()
    {
        $totalmensalidades = Mensalidade::count();
        //$veiculos = DB::table('veiculos')->paginate(5);
        //$clientes = DB::table('clientes')->get();
        return view('admin.financeiro.index', compact('totalmensalidades'));  
    }
}
