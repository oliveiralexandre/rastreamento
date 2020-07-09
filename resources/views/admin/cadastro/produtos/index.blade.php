@extends('adminlte::page')

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>Cadastro > Produtos</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
         <!-- Trigger the modal with a button -->
<a class="btn btn-primary btn-round text-white pull-left" data-toggle="modal" data-target="#myModal"><i class="fas fa-barcode"></i> Novo Produto</a>
<p>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Produtos</h5>
      </div>
      <div class="modal-body">
	  <!-- FORMULARIO -->
	  <div class="box box-primary">
            <div class="box-header with-border">
            <form action="{{url('/admin/cadastro/produtos/create')}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('description') ? 'has-error' : '' }}">
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}" required autofocus
                           placeholder="Descrição" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('amount') ? 'has-error' : '' }}">
                    <input type="text" name="amount" class="form-control" value="{{ old('amount') }}" required autofocus
                           placeholder="Valor">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('amount'))
                        <span class="help-block">
                            <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                    @endif
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
            <th>DESCRIÇÃO</th>
            <th>VALOR</th>
			      <th width="100px">AÇÕES</th>
	        </tr>
	    @foreach ($produtos as $produto)
	        <tr>
		        <td>{{$produto->id}}</td>
		        <td>{{$produto->description}}</td>
                <td>R$ {{$produto->amount}}</td>
		
		
        <td class="td-actions text-right">
        <a type="a" href="{{ route('cadastro.produtos.editar',$produto->id) }}" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon " data-original-title="" title="Editar Produto">
                          <i class="fas fa-user-edit"></i>
                        </a>    
        <a type="a" href="{{ route('cadastro.produtos.deletar',$produto->id) }}' }" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon " data-original-title="" title="Excluir">
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
                {!! $produtos->appends($filters)->links() !!}
            @else
                {!! $produtos->links() !!}
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

