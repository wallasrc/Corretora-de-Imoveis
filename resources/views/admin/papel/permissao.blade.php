@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Lista de Permissões para {{ $permissao->nome }}
        </h2>
        <div class="row">
            <form action="{{ route('admin.permissao.permissao.salvar', $papel->id) }}" method="POST">
                @csrf
                <div class="input-field">
                    <select name="permissao_id" id="permissao_id">
                        @foreach ($permissoes as $permissao)
                            <option value="{{ $permissao->id }}">
                                {{ $permissao->nome }}
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
                        <a href="{{ route('admin.permissao.index') }}" class="breadcrumb">Lista de Papéis</a>
                        <a href="#" class="breadcrumb">Lista de Permissoes</a>
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
                        <th>permissao</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($papel->permissoes as $permissao)
                        <tr>
                            <td>{{ $permissao->name }}</td>
                            <td>{{ $permissao->descricao }}</td>
                            <td>
                                <a href="javaScript: if (confirm('Tem certeza que deseja remover essa permissao?')) (window.location.href = '{{ route('admin.papels.permissao.remover', [$papel->id, $permissao->id]) }}')"
                                    class="btn red">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
