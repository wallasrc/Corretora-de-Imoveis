@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Editar Páginas
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.paginas.index') }}" class="breadcrumb">Lista de Páginas</a>
                        <a class="breadcrumb">Editar Páginas</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form enctype="multipart/form-data"  method="POST"
                action="{{ route('admin.paginas.atualizar', $pagina->id) }}">
                @csrf
                @method('PUT')

                @include('admin.paginas._form')

                <button class="btn blue">Salvar</button>
            </form>
        </div>
    </div>
@endsection
