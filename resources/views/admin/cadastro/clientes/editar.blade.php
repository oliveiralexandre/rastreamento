@extends('adminlte::page')

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>Editar > Cliente ({{$cliente->nome}})</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
        
		  <form action="{{ route('cadastro.clientes.atualizar',$cliente->id) }}" method="POST">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <input type="text" name="nome" class="form-control" value="{{ isset($cliente->nome) ? $cliente->nome : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('cpf') ? 'has-error' : '' }}">
                    <input type="text" name="cpf" class="form-control" value="{{ isset($cliente->cpf) ? $cliente->cpf : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('telefone') ? 'has-error' : '' }}">
                    <input type="text" name="telefone" class="form-control" value="{{ isset($cliente->telefone) ? $cliente->telefone : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('telefone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ isset($cliente->email) ? $cliente->email : '' }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('endereco') ? 'has-error' : '' }}">
                    <input type="text" name="endereco" class="form-control" value="{{ isset($cliente->endereco) ? $cliente->endereco : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('endereco'))
                        <span class="help-block">
                            <strong>{{ $errors->first('endereco') }}</strong>
                        </span>
                    @endif
                </div>            
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-round"><i class="fas fa-user-edit"></i> Atualizar</button>   
					<a type="a" class="btn btn-danger btn-round" href="{{ url('/admin/cadastro/clientes') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					                      
                    </div>
                   

                </form>
            </div>
            
            
              </div>
            </form>
          </div>
		  <!-- FIM FORMULARIO -->


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

