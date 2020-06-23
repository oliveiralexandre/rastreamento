<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $cliente;

    public function __construct(Cliente $cliente, User $user, Veiculo $veiculo)
    {
        $this->cliente = $cliente;
        $this->user = $user;
        $this->veiculo = $veiculo;
    }

    public function index(Cliente $cliente, User $user, Veiculo $veiculo)
    {
        //$plans = $this->repository->latest()->paginate();
        $totalclientes = Cliente::count();
        $totalusers = User::count();
        $totalveiculos = Veiculo::count();
        return view('admin.index', compact('totalclientes', 'totalusers', 'totalveiculos'));       
        
    }
}
