@extends('adminlte::page')

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>Editar > Mensalidade ({{$mensalidade->clientes}})</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
        
		  <form action="{{ route('financeiro.mensalidade.atualizar',$mensalidade->id) }}" method="POST">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('valor') ? 'has-error' : '' }}">
                    <input disabled="disabled" type="text" name="valor" class="form-control" value="{{ isset($mensalidade->valor) ? $mensalidade->valor : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('valor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('valor') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('vencimento') ? 'has-error' : '' }}">
                    <input disabled="disabled" type="text" name="vencimento" class="form-control" value="{{ isset($mensalidade->vencimento) ? $mensalidade->vencimento : '' }}">
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
                <div class="form-group has-feedback {{ $errors->has('clientes') ? 'has-error' : '' }}">
                    <input disabled="disabled" type="text" name="clientes" class="form-control" value="{{ isset($mensalidade->clientes) ? $mensalidade->clientes : '' }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('clientes'))
                        <span class="help-block">
                            <strong>{{ $errors->first('clientes') }}</strong>
                        </span>
                    @endif
                </div>
            
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-round"><i class="fas fa-user-edit"></i> Atualizar</button>   
					<a type="a" class="btn btn-danger btn-round" href="{{ url('/admin/financeiro/mensalidade') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					                      
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

