@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Adicionar Imóveis
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.index') }}" class="breadcrumb">Lista de Imóveis</a>
                        <a href="#" class="breadcrumb">Adicionar Imóveis</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form enctype="multipart/form-data" action="{{ route('admin.imoveis.salvar') }}" method="POST">
                @csrf

                @include('admin.imoveis._form')

                <button class="btn blue">Salvar</button>
            </form>
        </div>
    </div>
@endsection
