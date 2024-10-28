@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Adicionar Papel
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.papel.index') }}" class="breadcrumb">Lista de Papéis</a>
                        <a href="#" class="breadcrumb">Adicionar Papel</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.papel.salvar') }}" method="POST">
                @csrf

                @include('admin.papel._form')

                <button class="btn blue">Salvar</button>
            </form>
        </div>
    </div>
@endsection
