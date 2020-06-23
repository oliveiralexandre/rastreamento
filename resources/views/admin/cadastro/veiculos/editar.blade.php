@extends('adminlte::page')

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>Editar > Cliente ({{$veiculo->marca}})</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
        
		  <form action="{{ route('cadastro.veiculos.atualizar',$veiculo->id) }}" method="POST">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('marca') ? 'has-error' : '' }}">
                    <input type="text" name="marca" class="form-control" value="{{ isset($veiculo->marca) ? $veiculo->marca : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('marca'))
                        <span class="help-block">
                            <strong>{{ $errors->first('marca') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('modelo') ? 'has-error' : '' }}">
                    <input type="text" name="modelo" class="form-control" value="{{ isset($veiculo->modelo) ? $veiculo->modelo : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('modelo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('modelo') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('ano') ? 'has-error' : '' }}">
                    <input type="text" name="ano" class="form-control" value="{{ isset($veiculo->ano) ? $veiculo->ano : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('ano'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ano') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('cor') ? 'has-error' : '' }}">
                    <input type="text" name="cor" class="form-control" value="{{ isset($veiculo->cor) ? $veiculo->cor : '' }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('cor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cor') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('placa') ? 'has-error' : '' }}">
                    <input type="text" name="placa" class="form-control" value="{{ isset($veiculo->placa) ? $veiculo->placa : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('placa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('placa') }}</strong>
                        </span>
                    @endif
                </div>
            
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-round"><i class="fas fa-user-edit"></i> Atualizar</button>   
					<a type="a" class="btn btn-danger btn-round" href="{{ url('/admin/cadastro/veiculos') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					                      
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

