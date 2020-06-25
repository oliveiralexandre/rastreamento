<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Mensalidade;
use App\Models\Cliente;
use App\Models\Status;

class MensalidadeController extends Controller
{
    private $repository;

    private $mensalidade;
    private $cliente;
    private $status;
    
    public function __construct(Mensalidade $mensalidade, Cliente $cliente, Status $status)
    {
        $this->cliente = $cliente;
        $this->mensalidade = $mensalidade;
    }

    public function index(Cliente $cliente, Status $status)
    {
        $mensalidades = DB::table('mensalidades')->paginate(5);
        $clientes = DB::table('clientes')->get();
        $status = DB::table('status')->get();        
        return view('admin.financeiro.mensalidade.index', compact('mensalidades', 'clientes', 'status'));
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
        $insert = $this->mensalidade->create($dataForm);
        if( $insert )
        
        return redirect()->action('Admin\MensalidadeController@index');
    else
        return redirect()->action('Admin\MensalidadeController@index');
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
        $mensalidade = mensalidade::find($id);
        return view('admin.financeiro.mensalidade.editar', compact('mensalidade'));
    }

    public function atualizar(Request $request, $id)
    {

        mensalidade::find($id)->update($request->all());
        
        Alert::success('Atualizado com Sucesso!');

        return redirect()->action('Admin\MensalidadeController@index');
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
        return view('admin.financeiro.mensalidade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        mensalidade::find($id)->delete();
        Alert::success('Deletado com Sucesso!');
        return redirect()->action('Admin\MensalidadeController@index');

    }

}
