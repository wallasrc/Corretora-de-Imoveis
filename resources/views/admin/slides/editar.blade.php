@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">
            Editar Slide
        </h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.slides.index') }}" class="breadcrumb">slide de Slides</a>
                        <a class="breadcrumb">Editar Slide</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form enctype="multipart/form-data" action="{{ route('admin.slides.atualizar', $slide->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.slides._form')

                <button class="btn blue">Salvar</button>
            </form>
        </div>
    </div>
@endsection
