@extends('adminlte::page')

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>Editar > Produto ({{$produto->description}})</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
        
		  <form action="{{ route('cadastro.produtos.atualizar',$produto->id) }}" method="POST">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('description') ? 'has-error' : '' }}">
                    <input type="text" name="description" class="form-control" value="{{ isset($produto->description) ? $produto->description : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('amount') ? 'has-error' : '' }}">
                    <input type="text" name="amount" class="form-control" value="{{ isset($produto->amount) ? $produto->amount : '' }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('amount'))
                        <span class="help-block">
                            <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                    @endif
                </div>         
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-round"><i class="fas fa-user-edit"></i> Atualizar</button>   
					<a type="a" class="btn btn-danger btn-round" href="{{ url('/admin/cadastro/produtos') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					                      
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

