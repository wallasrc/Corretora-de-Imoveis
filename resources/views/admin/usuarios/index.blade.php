@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Lista de Usuários
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="#!" class="breadcrumb">Lista de Usuários</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td> #{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.usuarios.editar', $user->id) }}" class="btn orange">Editar</a>
                                <a href="{{ route('admin.usuarios.papel', $user->id) }}" class="btn blue">Papéis</a>
                                <a href="javaScript: if (confirm('Tem certeza que deseja deleter esse registro?')) (window.location.href = '{{ route('admin.usuarios.deletar', $user->id) }}')"
                                    class="btn red">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{ route('admin.usuarios.adicionar') }}">
                Adicionar
            </a>
        </div>
    </div>
@endsection
