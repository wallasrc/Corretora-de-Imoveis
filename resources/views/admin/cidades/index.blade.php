@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Lista de Cidades
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="#!" class="breadcrumb">Lista de Cidades</a>
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
                        <th>Estado</th>
                        <th>Sigla do Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cidades as $cidade)
                        <tr>
                            <td>#{{ $cidade->id }}</td>
                            <td>{{ $cidade->nome }}</td>
                            <td>{{ $cidade->estado }}</td>
                            <td>{{ $cidade->sigla_estado }}</td>
                            <td>
                                <a href="{{ route('admin.cidades.editar', $cidade->id) }}" class="btn orange">Editar</a>
                                <a href="javaScript: if (confirm('Tem certeza que deseja deleter esse registro?')) (window.location.href = '{{ route('admin.cidades.deletar', $cidade->id) }}')"
                                    class="btn red">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{ route('admin.cidades.adicionar') }}">
                Adicionar
            </a>
        </div>
    </div>
@endsection
