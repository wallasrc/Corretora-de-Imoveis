@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Lista de Papéis
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="#!" class="breadcrumb">Lista de Papéis</a>
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
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($papeis as $papel)
                        <tr>
                            <td>#{{ $papel->id }}</td>
                            <td>{{ $papel->nome }}</td>
                            <td>{{ $papel->descricao }}</td>
                            <td>
                                @if ($papel->nome !== 'admin')
                                    <a href="{{ route('admin.papel.editar', $papel->id) }}" class="btn orange">Editar</a>
                                    <a href="javaScript: if (confirm('Tem certeza que deseja deleter esse registro?')) (window.location.href = '{{ route('admin.papel.deletar', $papel->id) }}')"
                                        class="btn red">Deletar</a>
                                @else
                                    <a class="btn orange disabled">Editar</a>
                                    <a class="btn red disabled">Deletar</a>
                                @endif
                                <a href="{{ route('admin.papel.permissao', $papel->id) }}" class="btn red">Permissão</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{ route('admin.papel.adicionar') }}">
                Adicionar
            </a>
        </div>
    </div>
@endsection
