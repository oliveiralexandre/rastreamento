@extends('adminlte::page')

@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
</nav><div class="container">
 
<h3>Financeiro > Mensalidades > Novo</h3>   
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
         <!-- Trigger the modal with a button -->
      <!-- FORMULARIO -->
	  <div class="box box-primary">
            <div class="box-header with-border">
            <form action="{{url('/admin/financeiro/mensalidade/create')}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group">                    
                    <select name="valor" id="valor" class="form-control">
                         @foreach($produtos as $produto)    
                    <option value="{{ $produto->amount }}">{{ $produto->amount }}</option>
                         @endforeach
                    </select> 
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
                    <select name="produtos" id="produtos" class="form-control">
                         @foreach($produtos as $produto)    
                    <option value="{{ $produto->description }}">{{ $produto->description }}</option>
                         @endforeach
                    </select> 
                </div>
                <div class="form-group">                    
                    <select name="clientes" id="clientes" class="form-control">
                         @foreach($clientes as $cliente)    
                    <option value="{{ $cliente->name }} - {{ $cliente->cpf }}">{{ $cliente->name }} - {{ $cliente->cpf }}</option>
                         @endforeach
                    </select> 
                </div>


            
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-round"><i class="fas fa-plus-circle"></i> Cadastrar</button>
                    <a class="btn btn-danger btn-round" href="{{ url('/admin/financeiro/mensalidade') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>                     

                    </div>
                   

                </form>
            </div>
            
            
              </div>
            </form>
          </div>
		  <!-- FIM FORMULARIO -->
      
@endsection

