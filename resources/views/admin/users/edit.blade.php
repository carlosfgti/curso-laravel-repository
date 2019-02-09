@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <h1>
        Editar Usuário: {{ $user->name }}
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('users.index') }}">Usuários</a></li>
        <li><a href="{{ route('users.edit', $user->id) }}" class="active">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')

                <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
                    <input type="hidden" name="_method" value="PUT">

                    @include('admin.users._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop