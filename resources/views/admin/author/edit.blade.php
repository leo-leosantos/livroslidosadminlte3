@extends('adminlte::page')


@section('title', 'Authores')

@section('content_header')

    <div class=>
        <a href="{{ route('editora.index') }}" class="btn btn-outline-success">
            <i class="fas fa-fast-backward"></i>
            Voltar
        </a>
    </div>



@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title">Editar Nome do Author</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            @include('admin.includes.alerts')

            <form class="form" action="{{ route('author.update', $author->id) }}" method="POST" >

                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome-author">Nome do Author</label>
                    <input type="text" name="name_author" class="form-control" id="nome" placeholder="Nome do Author" value="{{ old('name_author') ?? $author->name_author}}">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

@stop
