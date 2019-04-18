@extends('adminlte::page')

@section('title', 'Relatório mensal de vendas')

@section('content_header')
    <h1>
        Vue.js
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="#" class="active">Vue.js</a></li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                <reports-months></reports-months>
                
            </div>
        </div>
    </div>
@stop

@push('js')
<script src="{{ url('js/app.js') }}"></script>
@endpush