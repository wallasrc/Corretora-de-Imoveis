@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Adicionar Usuários
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.index') }}" class="breadcrumb">Lista de Usuários</a>
                        <a href="#" class="breadcrumb">Adicionar Usuários</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.usuarios.salvar') }}" method="POST">
                @csrf
    
                @include('admin.usuarios._form')
    
                <button class="btn blue">Salvar</button>
            </form>
        </div>
    </div>
@endsection
