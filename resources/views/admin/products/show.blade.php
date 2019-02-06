@extends('adminlte::page')

@section('title', "Detalhes do produto {$product->name}")

@section('content_header')
    <h1>
        Produto: {{ $product->name }}
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}">Produtos</a></li>
        <li><a href="{{ route('products.show', $product->id) }}" class="active">Detalhes</a></li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $product->id }}</p>
                <p><strong>Nome: </strong>{{ $product->name }}</p>
                <p><strong>Categoria: </strong>{{ $product->category->title }}</p>
                <p><strong>Preço: </strong>{{ $product->price }}</p>
                <p><strong>Descrição: </strong>{{ $product->description }}</p>

                <hr>

                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Deletar o Produto: {{ $product->name }}
                    </button>
                </form>

            </div>
        </div>
    </div>
@stop