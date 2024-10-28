@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Lista de Tipos
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="#!" class="breadcrumb">Lista de Tipos</a>
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
                        <th>Título</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipos as $tipo)
                        <tr>
                            <td>#{{ $tipo->id }}</td>
                            <td>{{ $tipo->titulo }}</td>
                            <td>
                                <a href="{{ route('admin.tipos.editar', $tipo->id) }}" class="btn orange">Editar</a>
                                <a href="javaScript: if (confirm('Tem certeza que deseja deleter esse registro?')) (window.location.href = '{{ route('admin.tipos.deletar', $tipo->id) }}')"
                                    class="btn red">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{ route('admin.tipos.adicionar') }}">
                Adicionar
            </a>
        </div>
    </div>
@endsection
