@extends('adminlte::page')

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>Cadastro > Clientes</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
         <!-- Trigger the modal with a button -->
<a class="btn btn-primary btn-round text-white pull-left" data-toggle="modal" data-target="#myModal"><i class="fas fa-user-plus"></i> Novo Cliente</a>
<p>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Clientes</h5>
      </div>
      <div class="modal-body">
	  <!-- FORMULARIO -->
	  <div class="box box-primary">
            <div class="box-header with-border">
            <form action="{{url('/admin/cadastro/clientes/create')}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required autofocus
                           placeholder="Nome" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('cpf') ? 'has-error' : '' }}">
                    <input type="text" name="cpf" class="form-control" value="{{ old('cpf') }}" required autofocus
                           placeholder="CPF">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('telefone') ? 'has-error' : '' }}">
                    <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}" required autofocus
                           placeholder="Telefone">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('telefone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus
                           placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('endereco') ? 'has-error' : '' }}">
                    <input type="text" name="endereco" class="form-control" value="{{ old('endereco') }}" required autofocus
                           placeholder="Endereço">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('endereco'))
                        <span class="help-block">
                            <strong>{{ $errors->first('endereco') }}</strong>
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
		        <th>NOME</th>
                <th>CPF</th>
                <th>TELEFONE</th>
                <th>EMAIL</th>
                <th>ENDEREÇO</th>
			    <th width="100px">AÇÕES</th>
	        </tr>
	    @foreach ($clientes as $cliente)
	        <tr>
		        <td>{{$cliente->id}}</td>
		        <td>{{$cliente->nome}}</td>
                <td>{{$cliente->cpf}}</td>
                <td>{{$cliente->telefone}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->endereco}}</td>
		
		
        <td class="td-actions text-right">
        <a type="a" href="{{ route('cadastro.clientes.editar',$cliente->id) }}" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon " data-original-title="" title="Editar Cliente">
                          <i class="fas fa-user-edit"></i>
                        </a>    
        <a type="a" href="{{ route('cadastro.clientes.deletar',$cliente->id) }}' }" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon " data-original-title="" title="Excluir">
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
                {!! $clientes->appends($filters)->links() !!}
            @else
                {!! $clientes->links() !!}
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

