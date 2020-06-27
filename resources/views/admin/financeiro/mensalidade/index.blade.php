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
			    <th width="100px">AÇÕES</th>
	        </tr>
	    @foreach ($mensalidades as $mensalidade)
	        <tr>
		        <td>{{$mensalidade->id}}</td>
		        <td>{{$mensalidade->valor}}</td>
            <td>{{ date( 'd/m/Y' , strtotime($mensalidade->vencimento))}}</td>
           
                <td>{{$mensalidade->status}}</td>
                <td>{{$mensalidade->clientes}}</td>		
		
        <td class="td-actions text-right">
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

