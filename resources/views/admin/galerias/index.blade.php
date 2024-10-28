@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Lista de Galerias
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.imoveis.index') }}" class="breadcrumb">Imóvies</a>
                        <a href="#!" class="breadcrumb">Lista de Galerias</a>
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
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Ordem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galerias as $galeria)
                        <tr>
                            <td>#{{ $galeria->id }}</td>
                            <td>{{ $galeria->titulo }}</td>
                            <td>{{ $galeria->descricao }}</td>
                            <td><img width="100" src="{{ asset($galeria->imagem)  }}" alt="Imagem"></td>
                            <td>{{ $galeria->ordem }}</td>
                            <td>
                                <a href="{{ route('admin.galerias.editar', $galeria->id) }}" class="btn orange">Editar</a>
                                <a href="javaScript: if (confirm('Tem certeza que deseja deleter esse registro?')) (window.location.href = '{{ route('admin.galerias.deletar', $galeria->id) }}')"
                                    class="btn red">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>           
        </div>
        <div class="row">
            <a class="btn blue" href="{{ route('admin.galerias.adicionar', $imovel->id) }}">
                Adicionar
            </a>
        </div>
    </div>
@endsection
