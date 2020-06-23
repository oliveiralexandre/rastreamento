@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>CADASTRO > PRODUTOS</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
         <!-- Trigger the modal with a button -->
<a class="btn btn-primary btn-round text-white pull-left" data-toggle="modal" data-target="#myModal">NOVO PRODUTO</a>
<p>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CADASTRO DE PRODUTOS</h5>
      </div>
      <div class="modal-body">
	  <!-- FORMULARIO -->
	  <div class="box box-primary">
            <div class="box-header with-border">
            <form action="{{url('/cadastro/produtos/create')}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('categoriaprodutos_categoria') ? 'has-error' : '' }}">
                <select class="form-control" name="categoriaprodutos_categoria">
                            @foreach($categoriaprodutos as $categoriaproduto)
                                 <option  class="btn btn-primary dropdown-toggle" value="{{$categoriaproduto->categoria}}">{{$categoriaproduto->categoria}}</option>
                            @endforeach
                    </select>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('categoriaprodutos_categoria'))
                        <span class="help-block">
                            <strong>{{ $errors->first('categoriaprodutos_categoria') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('produto') ? 'has-error' : '' }}">
                    <input type="text" name="produto" class="form-control" value="{{ old('produto') }}" required autofocus
                           placeholder="PRODUTO">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('produto'))
                        <span class="help-block">
                            <strong>{{ $errors->first('produto') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('estoque') ? 'has-error' : '' }}">
                    <input type="text" name="estoque" class="form-control" value="{{ old('estoque') }}" required autofocus
                           placeholder="ESTOQUE">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('estoque'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estoque') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('valor') ? 'has-error' : '' }}">
                    <input type="valor" name="valor" class="form-control" value="{{ old('valor') }}" required autofocus
                           placeholder="VALOR">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('valor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('valor') }}</strong>
                        </span>
                    @endif
                </div>            
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-round">CADASTRAR</button>
                    <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">SAIR</button>                         
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
		        <th>CATEGORIA</th>
                <th>PRODUTO</th>
                <th>ESTOQUE</th>
                <th>VALOR</th>
			    <th width="100px">AÇÕES</th>
	        </tr>
	    @foreach ($produtos as $produto)
	        <tr>
		        <td>{{$produto->id}}</td>
		        <td>{{$produto->categoriaprodutos_categoria}}</td>
                <td>{{$produto->produto}}</td>
                <td>{{$produto->estoque}}</td>
                <td>{{$produto->valor}}</td>		
		
        <td class="td-actions text-right">
        <a type="a" href="{{ route('cadastro.produtos.editar',$produto->id) }}" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon " data-original-title="" title="EDITAR PRODUTO">
                          <i class="now-ui-icons ui-2_settings-90"></i>
                        </a>    
        <a type="a" href="{{ route('cadastro.produtos.deletar',$produto->id) }}' }" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon " data-original-title="" title="EXCLUIR">
                          <i class="now-ui-icons ui-1_simple-remove"></i>
                        </a>

       
        </td>
		
	</tr>
	@endforeach
	
</table>

            </div>
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

