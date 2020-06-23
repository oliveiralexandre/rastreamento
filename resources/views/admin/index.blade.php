@extends('adminlte::page')

@section('content')

<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
            <h3>{{$totalclientes}}</h3>
              <h4>Clientes</h4>
            </div>
            <div class="icon">
              <i class="fas fa-id-card"></i>
            </div>
            <a href="/admin/cadastro/clientes" class="small-box-footer">Acessar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3>{{$totalveiculos}}</h3>
              <h4>Veículos</h4>
            </div>
            <div class="icon">
              <i class="fas fa-car"></i>
            </div>
            <a href="/admin/cadastro/veiculos" class="small-box-footer">Acessar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3>{{$totalusers}}</h3>
              <h4>Usuários</h4>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>





@endsection