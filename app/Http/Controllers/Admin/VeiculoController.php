<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Veiculo;
use App\Models\Cliente;

class VeiculoController extends Controller
{
    private $repository;
    
    private $veiculo;
    private $cliente;
    

    public function __construct(Veiculo $veiculo, Cliente $cliente)
    {
        $this->veiculo = $veiculo;
        $this->cliente = $cliente;
    }
    
    public function index(Veiculo $veiculo, Cliente $cliente)
    {
        $veiculos = DB::table('veiculos')->paginate(5);
        $clientes = DB::table('clientes')->get();
        return view('admin.cadastro.veiculos.index', compact('veiculos', 'clientes'));
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
        $insert = $this->veiculo->create($dataForm);
        if( $insert )
        
        return redirect()->action('Admin\VeiculoController@index');
    else
        return redirect()->action('Admin\VeiculoController@index');
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
        $veiculo = veiculo::find($id);
        return view('admin.cadastro.veiculos.editar', compact('veiculo'));
    }

    public function atualizar(Request $request, $id)
    {

        veiculo::find($id)->update($request->all());
        
        Alert::success('Atualizado com Sucesso!');

        return redirect()->action('Admin\VeiculoController@index');
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
        return view('admin.cadastro.veiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        veiculo::find($id)->delete();
        Alert::success('Deletado com Sucesso!');
        return redirect()->action('Admin\VeiculoController@index');

    }

}