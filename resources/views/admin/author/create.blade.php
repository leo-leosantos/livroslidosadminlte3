@extends('adminlte::page')


@section('title', 'Authores')

@section('content_header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <a href="{{ route('author.index') }}">
                        <button type="button" class="btn btn-outline-primary  float-right"><i class="fas fa-fast-backward"></i>
                            Voltar
                        </button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title">Cadastar Novo Author</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            @include('admin.includes.alerts')

            <form class="form" action="{{ route('author.store') }}" method="POST" >

                @csrf
                <div class="form-group">
                    <label for="nome-author">Nome do Author</label>
                    <input type="text" name="name_author" class="form-control" id="name-author" placeholder="Nome do Author" value=" {{ old('name_author') }}">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
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
