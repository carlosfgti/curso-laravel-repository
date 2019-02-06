@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')
    <h1>
        Editar Produto: {{ $product->name }}
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}">Produtos</a></li>
        <li><a href="{{ route('products.edit', $product->id) }}" class="active">Editar</a></li>
    </ol>
@stop

@section('content')
<div class="content row">

    <div class="box box-success">
        <div class="box-body">

            @include('admin.includes.alerts')

            {{ Form::model($product, ['route' => ['products.update', $product->id], 'class' => 'form']) }}
                @method('PUT')
                @include('admin.products._partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop