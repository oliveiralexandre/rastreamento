@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>EDITAR > PRODUTO ({{$produto->produto}})</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
        
		  <form action="{{ route('cadastro.produtos.atualizar',$produto->id) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('categoriaprodutos_categoria') ? 'has-error' : '' }}">
                    <input type="text" name="categoriaprodutos_categoria" class="form-control" value="{{ isset($produto->categoriaprodutos_categoria) ? $produto->categoriaprodutos_categoria : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('categoriaprodutos_categoria'))
                        <span class="help-block">
                            <strong>{{ $errors->first('categoriaprodutos_categoria') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('produto') ? 'has-error' : '' }}">
                    <input type="text" name="produto" class="form-control" value="{{ isset($produto->produto) ? $produto->produto : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('produto'))
                        <span class="help-block">
                            <strong>{{ $errors->first('produto') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('estoque') ? 'has-error' : '' }}">
                    <input type="text" name="estoque" class="form-control" value="{{ isset($produto->estoque) ? $produto->estoque : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('estoque'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estoque') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('valor') ? 'has-error' : '' }}">
                    <input type="valor" name="valor" class="form-control" value="{{ isset($produto->valor) ? $produto->valor : '' }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('valor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('valor') }}</strong>
                        </span>
                    @endif
                </div>            
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-round">ATUALIZAR</button>   
					<a type="a" class="btn btn-danger btn-round" href="{{ url('/cadastro/produtos') }}">CANCELAR</a>
					                      
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

