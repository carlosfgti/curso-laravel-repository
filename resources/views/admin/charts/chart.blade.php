@extends('adminlte::page')

@section('title', 'Relatório mensal de vendas')

@section('content_header')
    <h1>
        Relatório Mensal de Vendas
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="#" class="active">Gráficos</a></li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                {!! $chart->container() !!}
                
            </div>
        </div>
    </div>
@stop

@push('js')
{!! $chart->script() !!}

<script>
    let myCallback = (value, index, values) => numberToReal(value);
  
    let numberToReal = (value) => {
      let number = value.toFixed(2).split('.');
      number[0] = 'R$ ' + number[0].split(/(?=(?:...)*$)/).join('.');
      
      return number.join(',');
    }
  </script>
@endpush
