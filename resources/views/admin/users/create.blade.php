@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    <h1>
        Cadastrar Novo Usuário
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('users.index') }}">Usuários</a></li>
        <li><a href="{{ route('users.create') }}" class="active">Cadastrar</a></li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('users.store') }}" class="form" method="POST">
                    @include('admin.users._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop