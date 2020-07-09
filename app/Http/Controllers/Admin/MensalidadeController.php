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
use App\Models\Pedido;
use App\Models\Produto;
use PagSeguro;
use Redirect;

class MensalidadeController extends Controller
{
    protected $request;
    private $repository;

    private $mensalidade;
    private $cliente;
    private $produto;
    private $totalpage = 5;
   
    
    public function __construct(Request $request, Mensalidade $mensalidade, Cliente $cliente, Produto $produto)
    {
        $this->request = $request;
        $this->cliente = $cliente;
        $this->mensalidade = $mensalidade;
        $this->produto = $produto;
        $this->repository = $mensalidade;
        
    }

    public function index(Cliente $cliente, Produto $produto)
    {
        $mensalidades = DB::table('mensalidades')->paginate(5);
        $clientes = DB::table('clientes')->get();
        $produtos = DB::table('produtos')->get();  
              
        return view('admin.financeiro.mensalidade.index', compact('mensalidades', 'clientes', 'produtos'));
    }
    public function novo()
    {
        $mensalidades = DB::table('mensalidades')->paginate(5);
        $clientes = DB::table('clientes')->get();
        $produtos = DB::table('produtos')->get();        
        return view('admin.financeiro.mensalidade.novo', compact('mensalidades', 'clientes', 'produtos'));
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
        $status = DB::table('status')->get();        
        $mensalidade = mensalidade::find($id);
        return view('admin.financeiro.mensalidade.editar', compact('mensalidade','status'));
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

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $mensalidades = $this->repository->search($request->filter);

        return view('admin.financeiro.mensalidade.index', [
            'mensalidades' => $mensalidades,
            'filters' => $filters,
        ]);
    }

    public function action_boleto(Request $r)
    {  
        try {
            $cliente = Cliente::findOrFail(1);
            $produto = Produto::findOrFail(1);
            debug($cliente->name);
            $pagseguro = PagSeguro::setReference('1')
            ->setSenderInfo([
               'senderName' => $cliente->name, //Deve conter nome e sobrenome
               'senderPhone' => $cliente->phone, //Código de área enviado junto com o telefone
               'senderEmail' => $cliente->email,
               'senderHash' => $r->pagseguro_token,
               'senderCPF' => $cliente->cpf //Ou CPF se for Pessoa Física
            ])
            ->setShippingAddress([
               'shippingAddressStreet' => $cliente->street,
               'shippingAddressNumber' => $cliente->number,
               'shippingAddressDistrict' => $cliente->district,
               'shippingAddressPostalCode' => $cliente->postal_code,
               'shippingAddressCity' => $cliente->city,
               'shippingAddressState' => 'SP'
             ])
             ->setItems([
              [
                'itemId' => 'ID',
                'itemDescription' => $produto->description,
                'itemAmount' => $produto->amount, //Valor unitário
                'itemQuantity' => '1', // Quantidade de itens
              ],
            ])
            ->send([
              'paymentMethod' => 'boleto'
            ]);
        }
        catch(\Artistas\PagSeguro\PagSeguroException $e) {
            $e->getCode(); //codigo do erro
            $e->getMessage(); //mensagem do erro
        }
        //$url = "$pagseguro->paymentLink";
        return Redirect::to($pagseguro->paymentLink);
    }
    public function pagseguro()
    {              
        return view('admin.financeiro.mensalidade.pagseguro.principal');
    }
}
