@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Lista de Slides
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="#!" class="breadcrumb">Lista de Slides</a>
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
                        <th>Ordem</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Publicado</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $slide)
                        <tr>
                            <td>{{ $slide->ordem }}</td>
                            <td>{{ $slide->titulo }}</td>
                            <td>{{ $slide->descricao }}</td>
                            <td>{{ $slide->publicado }}</td>
                            <td><img width="100" src="{{ asset($slide->imagem) }}" alt="Imagem"></td>
                            <td>
                                <a href="{{ route('admin.slides.editar', $slide->id) }}" class="btn orange">Editar</a>
                                <a href="javaScript: if (confirm('Tem certeza que deseja deleter esse registro?')) (window.location.href = '{{ route('admin.slides.deletar', $slide->id) }}')"
                                    class="btn red">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{ route('admin.slides.adicionar') }}">
                Adicionar
            </a>
        </div>
    </div>
@endsection
