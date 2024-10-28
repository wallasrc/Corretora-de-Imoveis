@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Adicionar Tipo
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.index') }}" class="breadcrumb">Lista de Tipos</a>
                        <a href="#" class="breadcrumb">Adicionar Tipos</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.tipos.salvar') }}" method="POST">
                @csrf
    
                @include('admin.tipos._form')
    
                <button class="btn blue">Salvar</button>
            </form>
        </div>
    </div>
@endsection
