@extends('adminlte::page')

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>Cadastro > Veículos</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
         <!-- Trigger the modal with a button -->
       
<a class="btn btn-primary btn-round text-white pull-left" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Novo Veículo</a>
<p> 
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de Veículos</h5>
      </div>
      <div class="modal-body">
	  <!-- FORMULARIO -->
	  <div class="box box-primary">
            <div class="box-header with-border">
            <form action="{{url('/admin/cadastro/veiculos/create')}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('marca') ? 'has-error' : '' }}">
                    <input type="text" name="marca" class="form-control" value="{{ old('marca') }}" required autofocus
                           placeholder="Marca" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('marca'))
                        <span class="help-block">
                            <strong>{{ $errors->first('marca') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('modelo') ? 'has-error' : '' }}">
                    <input type="text" name="modelo" class="form-control" value="{{ old('modelo') }}" required autofocus
                           placeholder="Modelo">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('modelo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('modelo') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('ano') ? 'has-error' : '' }}">
                    <input type="text" name="ano" class="form-control" value="{{ old('ano') }}" required autofocus
                           placeholder="Ano">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('ano'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ano') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('cor') ? 'has-error' : '' }}">
                    <input type="text" name="cor" class="form-control" value="{{ old('cor') }}" required autofocus
                           placeholder="Cor">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('cor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cor') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('placa') ? 'has-error' : '' }}">
                    <input type="text" name="placa" class="form-control" value="{{ old('placa') }}" required autofocus
                           placeholder="Placa">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('placa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('placa') }}</strong>
                        </span>
                    @endif
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
		        <th>MARCA</th>
            <th>MODELO</th>
            <th>ANO</th>
            <th>COR</th>
            <th>PLACA</th>
            <th>CLIENTE</th>
			    <th width="100px">AÇÕES</th>
	        </tr>
	    @foreach ($veiculos as $veiculo)
	        <tr>
		        <td>{{$veiculo->id}}</td>
		        <td>{{$veiculo->marca}}</td>
                <td>{{$veiculo->modelo}}</td>
                <td>{{$veiculo->ano}}</td>
                <td>{{$veiculo->cor}}</td>
                <td>{{$veiculo->placa}}</td>
                <td>{{$veiculo->clientes}}</td>
		
		
        <td class="td-actions text-right">
        <a type="a" href="{{ route('cadastro.veiculos.editar',$veiculo->id) }}" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon " data-original-title="" title="Editar Veículo">
                          <i class="fas fa-user-edit"></i>
                        </a>    
        <a type="a" href="{{ route('cadastro.veiculos.deletar',$veiculo->id) }}' }" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon " data-original-title="" title="Excluir">
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
                {!! $veiculos->appends($filters)->links() !!}
            @else
                {!! $veiculos->links() !!}
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

