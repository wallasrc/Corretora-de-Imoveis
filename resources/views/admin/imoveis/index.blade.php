@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Lista de Imóveis
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="#!" class="breadcrumb">Lista de Imóveis</a>
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
                        <th>Status</th>
                        <th>Cidade</th>
                        <th>Valor</th>
                        <th>Imagem</th>
                        <th>Publicado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($imoveis as $imovel)
                        <tr>
                            <td>#{{ $imovel->id }}</td>
                            <td>{{ $imovel->titulo }}</td>
                            <td>{{ $imovel->status }}</td>
                            <td>{{ $imovel->cidade->nome }}</td>
                            <td>R$ {{ number_format($imovel->valor, 2, ',', '.') }}</td>
                            <td><img width="100" src="{{ asset($imovel->imagem)  }}" alt="Imagem"></td>
                            <td>{{ $imovel->publicar }}</td>
                            <td>
                                <a href="{{ route('admin.imoveis.editar', $imovel->id) }}" class="btn orange">Editar</a>
                                <a href="{{ route('admin.galerias.index', $imovel->id) }}" class="btn blue">Galeria</a>
                                <a href="javaScript: if (confirm('Tem certeza que deseja deleter esse registro?')) (window.location.href = '{{ route('admin.imoveis.deletar', $imovel->id) }}')"
                                    class="btn red">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>           
        </div>
        <div class="row">
            <a class="btn blue" href="{{ route('admin.imoveis.adicionar') }}">
                Adicionar
            </a>
        </div>
    </div>
@endsection
