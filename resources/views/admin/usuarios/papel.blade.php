@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Lista de Papéis para {{ $usuario->name }}
        </h2>
        <div class="row">
            <form action="{{ route('admin.usuarios.papel.salvar', $usuario->id) }}" method="POST">
                @csrf
                <div class="input-field">
                    <select name="papel_id" id="papel_id">
                        @foreach ($papeis as $papel)
                            <option value="{{ $papel->id }}">
                                {{ $papel->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="btn blue">Adicionar</button>
            </form>
        </div>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.index') }}" class="breadcrumb">Lista de Usuários</a>
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
                        <th>papel</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuario->papeis as $papel)
                        <tr>
                            <td>{{ $papel->name }}</td>
                            <td>{{ $papel->descricao }}</td>
                            <td>
                                <a href="javaScript: if (confirm('Tem certeza que deseja remover esse papel?')) (window.location.href = '{{ route('admin.usuarios.papel.remover', [$usuario->id, $papel->id]) }}')"
                                    class="btn red">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
