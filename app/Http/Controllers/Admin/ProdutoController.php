<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Produto;

class ProdutoController extends Controller
{
    private $repository;
    
    private $produto;
    
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    public function index(Produto $produto)
    {
        $produtos = DB::table('produtos')->paginate(5);
              
        return view('admin.cadastro.produtos.index', compact('produtos'));
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
        $insert = $this->produto->create($dataForm);
        if( $insert )
        
        return redirect()->action('Admin\ProdutoController@index');
    else
        return redirect()->action('Admin\ProdutoController@index');
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
        $produto = produto::find($id);
        return view('admin.cadastro.produtos.editar', compact('produto'));
    }

    public function atualizar(Request $request, $id)
    {

        produto::find($id)->update($request->all());
        
        Alert::success('Atualizado com Sucesso!');

        return redirect()->action('Admin\ProdutoController@index');
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
        return view('admin.cadastro.produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        produto::find($id)->delete();
        Alert::success('Deletado com Sucesso!');
        return redirect()->action('Admin\ProdutoController@index');

    }

}