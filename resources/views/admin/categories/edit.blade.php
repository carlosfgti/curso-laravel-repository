@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>
        Editar Categoria: {{ $category->title }}
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li><a href="{{ route('categories.edit', $category->id) }}" class="active">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
                    <input type="hidden" name="_method" value="PUT">

                    @include('admin.categories._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop