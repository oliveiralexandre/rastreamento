
 <!-- FORMULARIO -->
 <div class="box box-primary">
       <div class="box-header with-border">
       <form action="{{url('/admin/financeiro/mensalidade/create')}}" method="post">
           {!! csrf_field() !!}

           <div class="form-group has-feedback {{ $errors->has('valor') ? 'has-error' : '' }}">
               <input type="text" name="valor" class="form-control" value="{{ old('valor') }}" required autofocus
                      placeholder="Valor" >
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
               @if ($errors->has('valor'))
                   <span class="help-block">
                       <strong>{{ $errors->first('valor') }}</strong>
                   </span>
               @endif
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
               <select name="status" id="status" class="form-control">
                    @foreach($status as $status)    
               <option value="{{ $status->status }}">{{ $status->status }}</option>
                    @endforeach
               </select> 
           </div>
           <div class="form-group">                    
               <select name="clientes" id="clientes" class="form-control">
                    @foreach($clientes as $cliente)    
               <option value="{{ $cliente->nome }} - {{ $cliente->cpf }}">{{ $cliente->nome }} - {{ $cliente->cpf }}</option>
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

try {
            $pagseguro = PagSeguro::setReference('1')
            ->setSenderInfo([
               'senderName' => 'Nome Completo', //Deve conter nome e sobrenome
               'senderPhone' => '(32) 1324-1421', //Código de área enviado junto com o telefone
               'senderEmail' => 'email@email.com',
               'senderHash' => '$r->pagseguro_token',
               'senderCNPJ' => '98.966.488/0001-00' //Ou CPF se for Pessoa Física
            ])
            ->setShippingAddress([
               'shippingAddressStreet' => 'Rua/Avenida',
               'shippingAddressNumber' => 'Número',
               'shippingAddressDistrict' => 'Bairro',
               'shippingAddressPostalCode' => '12345-678',
               'shippingAddressCity' => 'Cidade',
               'shippingAddressState' => 'SP'
             ])
             ->setItems([
              [
                'itemId' => 'ID',
                'itemDescription' => 'Nome do Item',
                'itemAmount' => 12.14, //Valor unitário
                'itemQuantity' => '1', // Quantidade de itens
              ],
            ])
            ->send([
              'paymentMethod' => 'boleto'
            ]);
        }
        catch(\Artistas\PagSeguro\PagSeguroException $e) {
            $e->getCode(); //codigo do erro
            $e->getMessage(); //mensagem do erro
        }
        //$url = "$pagseguro->paymentLink";
        //return Redirect::to($pagseguro->paymentLink);

