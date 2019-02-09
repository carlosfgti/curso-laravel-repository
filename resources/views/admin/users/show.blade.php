@extends('adminlte::page')

@section('title', "Detalhes do usuário {$user->title}")

@section('content_header')
    <h1>
        Usuário: {{ $user->name }}
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('users.index') }}">Usuários</a></li>
        <li><a href="{{ route('users.show', $user->id) }}" class="active">Detalhes</a></li>
    </ol>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $user->id }}</p>
                <p><strong>Nome: </strong>{{ $user->name }}</p>
                <p><strong>E-mail: </strong>{{ $user->email }}</p>

                <hr>

                <form action="{{ route('users.destroy', $user->id) }}" class="form" method="POST">
                    @csrf

                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>

            </div>
        </div>
    </div>
@stop