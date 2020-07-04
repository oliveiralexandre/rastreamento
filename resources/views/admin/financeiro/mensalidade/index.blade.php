@extends('adminlte::page')

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>Financeiro > Mensalidades</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
         <!-- Trigger the modal with a button -->
         <a class="btn btn-primary btn-round text-white pull-left" href="{{ url('/admin/financeiro/mensalidade/novo') }}"><i class="fas fa-plus-circle"></i> Nova Mensalidade</a>
<p> 
   <!-- Formulário de Pesquisa -->
   <form action="{{ route('search') }}" method="post" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="Pesquisar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
        <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Pesquisar</button>
    </form>


  <div class="table-responsive">      
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">              
	        <tr>
		        <th>ID</th>
		        <th>VALOR</th>
            <th>VENCIMENTO</th>
            <th>STATUS</th>
            <th>CLIENTE</th>
			    <th width="120px">AÇÕES</th>
	        </tr>
	    @foreach ($mensalidades as $mensalidade)
	        <tr>
		        <td>{{$mensalidade->id}}</td>
		        <td>{{$mensalidade->valor}}</td>
            <td>{{ date( 'd/m/Y' , strtotime($mensalidade->vencimento))}}</td>
           
                <td>{{$mensalidade->status}}</td>
                <td>{{$mensalidade->clientes}}</td>		
		
        <td class="td-actions text-right">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm btn-round btn-icon" data-toggle="modal" data-target="#exampleModal" data-original-title="" title="Gerar Boleto"><i class="fas fa-file-invoice-dollar"></i></button>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Gerar Boleto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                   

                   
                <script>
                        function sl () {
                            $('#pagseguro_token').val(PagSeguroDirectPayment.getSenderHash())
                        }
                </script>
              
                <button class="btn btn-success" onclick="sl();">Gerar Token</button><br>
                
                <form method="GET" action="{{ route('boleto_action') }}">
                    <input class="border-0" style="min-width:480px;" type="text" id="pagseguro_token" name="pagseguro_token" value="{{ old('descricao') }}"/><br><br>
                    <button class="btn btn-info" type="submit" formtarget="_blank">Imprimir</button>
                </form>

                <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
                
                <!-- PAGSEGURO-PRODUÇÃO  
                <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
                -->

                <!-- Sandbox -->
                <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
                
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- FIM MODAL -->
        <a type="a" href="{{ route('financeiro.mensalidade.editar',$mensalidade->id) }}" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon " data-original-title="" title="Editar Mensalidade">
                          <i class="fas fa-user-edit"></i>
                        </a>    
        <a type="a" href="{{ route('financeiro.mensalidade.deletar',$mensalidade->id) }}' }" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon " data-original-title="" title="Excluir">
                          <i class="fas fa-trash-alt"></i>
                        </a>       
        </td>
		
	</tr>
	@endforeach
	
</table>

            </div>
</div>
<div class="card-footer">
            @if (isset($filters))
                {!! $mensalidades->appends($filters)->links() !!}
            @else
                {!! $mensalidades->links() !!}
            @endif
</div>

<!-- FIM Modal -->
            <div class="col-12 mt-2">
                                        </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- end row -->
  </div>
      
@endsection

