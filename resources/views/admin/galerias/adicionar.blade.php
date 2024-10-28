@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Adicionar Imagens
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.index') }}" class="breadcrumb">Lista de Imóveis</a>
                        <a href="{{ route('admin.galerias.index', $imovel->id) }}" class="breadcrumb">Galeria</a>
                        <a href="#" class="breadcrumb">Adicionar Imagens</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form enctype="multipart/form-data" action="{{ route('admin.galerias.salvar', $imovel->id) }}" method="POST">
                @csrf

                @include('admin.galerias._form')

                <button class="btn blue">Salvar</button>
            </form>
        </div>
    </div>
@endsection
