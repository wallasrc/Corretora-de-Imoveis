@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Lista de Páginas
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="#!" class="breadcrumb">Lista de Páginas</a>
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
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td> #{{ $page->id }}</td>
                            <td>{{ $page->titulo }}</td>
                            <td>{{ $page->descricao }}</td>
                            <td>{{ $page->tipo }}</td>
                            <td>
                                <a href="{{ route('admin.paginas.editar', $page->id) }}" class="btn orange">Editar</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
