<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Cliente;
use App\Models\Veiculo;


class ClienteController extends Controller
{
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    
    public function index(Cliente $cliente, Veiculo $veiculo)
    {
        $clientes = DB::table('clientes')->paginate(5);
        return view('admin.cadastro.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::success('Cadastro efetuado com Sucesso!');
        //Pega todos os dados que vem do formulário
        $dataForm = $request->all();  
        
        //Faz o cadastro
        $insert = $this->cliente->create($dataForm);
        if( $insert )
        
        return redirect()->action('Admin\ClienteController@index');
    else
        return redirect()->action('Admin\ClienteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $cliente = cliente::find($id);
        return view('admin.cadastro.clientes.editar', compact('cliente'));
    }

    public function atualizar(Request $request, $id)
    {

        Cliente::find($id)->update($request->all());
        
        Alert::success('Atualizado com Sucesso!');

        return redirect()->action('Admin\ClienteController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('admin.cadastro.clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        Cliente::find($id)->delete();
        Alert::success('Deletado com Sucesso!');
        return redirect()->action('Admin\ClienteController@index');

    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $clientes = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->orWhere('nome', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('title', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.cadastro.clientes.index', compact('clientes', 'filters'));
    }
}