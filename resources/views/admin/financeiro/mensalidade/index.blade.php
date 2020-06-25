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
       
<a class="btn btn-primary btn-round text-white pull-left" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Nova Mensalidade</a>
<p> 
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Mensalidades</h5>
      </div>
      <div class="modal-body">
	  <!-- FORMULARIO -->
	  <div class="box box-primary">
            <div class="box-header with-border">
            <form action="{{url('/admin/financeiro/mensalidade/create')}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('valor') ? 'has-error' : '' }}">
                    <input type="text" name="valor" class="form-control" value="{{ old('valor') }}" required autofocus
                           placeholder="Valor" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('marca'))
                        <span class="help-block">
                            <strong>{{ $errors->first('valor') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('vencimento') ? 'has-error' : '' }}">
                    <input type="date" name="vencimento" class="form-control" value="{{ old('vencimento') }}" required autofocus
                           placeholder="Vencimento">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('vencimento'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vencimento') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">                    
                    <select name="status" id="status" class="form-control">
                         @foreach($status as $status)    
                    <option value="{{ $status->status }}">{{ $status->status }}</option>
                         @endforeach
                    </select> 
                </div>
                <div class="form-group">                    
                    <select name="clientes" id="clientes" class="form-control">
                         @foreach($clientes as $cliente)    
                    <option value="{{ $cliente->nome }} - {{ $cliente->cpf }}">{{ $cliente->nome }} - {{ $cliente->cpf }}</option>
                         @endforeach
                    </select> 
                </div>


            
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-round">Cadastrar</button>
                    <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Sair</button>                         
                    </div>
                   

                </form>
            </div>
            
            
              </div>
            </form>
          </div>
		  <!-- FIM FORMULARIO -->
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
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
           
                <td>{{$status->status}}</td>
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

