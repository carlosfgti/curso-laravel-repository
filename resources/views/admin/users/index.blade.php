@extends('adminlte::page')

@section('title', 'Listagem dos Usuários')

@section('content_header')
    <h1>
        <a href="{{ route('users.create') }}" class="btn btn-success">Add</a>
        Usuários
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('users.index') }}" class="active">Usuários</a></li>
    </ol>
@stop

@section('content')
    <div class="content row">

        <div class="box box-success">
            <div class="box-body">
                <form action="{{ route('users.search') }}" class="form form-inline" method="POST">
                    @csrf
                    <input type="text" name="filter" placeholder="Filtrar?" class="form-control" value="{{ $data['filter'] ?? '' }}">
                    <button type="submit" class="btn btn-success">Pesquisar</button>
                </form>

                @if (isset($data))
                    <a href="{{ route('users.index') }}">(x) Limpar Resultados da Pesquisa</a>
                @endif
            </div>
        </div>

        <div class="box box-success">
            <div class="box-body">

                @include('admin.includes.alerts')
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th width="150px" scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="badge bg-yellow">
                                    Editar
                                </a>
                                <a href="{{ route('users.show', $user->id) }}" class="badge bg-primary">
                                    Detalhes
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (isset($data))
                    {!! $users->appends($data)->links() !!}
                @else
                    {!! $users->links() !!}
                @endif

            </div>
        </div>
    </div>
@stop