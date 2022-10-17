@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}">

@endsection
@section('title', 'Livros')

@section('content_header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <a href="{{ route('book.index') }}">
                        <button type="button" class="btn btn-outline-primary  float-right"><i
                                class="fas fa-fast-backward"></i>
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
            <h3 class="card-title">Cadastar Novo Livro</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            @include('admin.includes.alerts')

            <form class="form" action="{{ route('editora.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="title_book">Titulo do Livro</label>
                        <input type="text" name="title" class="form-control" id="title_book"
                            placeholder="Titulo do Livro" value="{{ '' ?? old('title') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="serie">Serie</label>
                        <input type="text" name="serie" class="form-control" id="serie"
                            placeholder="Ex: As Crônicas de Gelo e Fogo" value="{{ '' ?? old('serie') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="volume">Volume</label>
                        <input type="text" name="volume" class="form-control" id="volume" placeholder="Ex: Volume 1"
                            value="{{ '' ?? old('volume') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="page-number">Número de Páginas</label>
                        <input type="number" min="0" name="page_number" class="form-control" id="page-number"
                            placeholder="Número de Páginas" value="{{ '' ?? old('page_number') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date-start-reading">Data Início da Leitura</label>
                        <input type="date" name="date_start_reading" class="form-control" id="date-start-reading"
                            value="{{ '' ?? old('date_start_reading') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date-start-reading">Data Fim da Leitura</label>
                        <input type="date" name="date_start_reading" class="form-control" id="date-start-reading"
                            value="{{ '' ?? old('date_start_reading') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="author_id">Selecione o Nome do Author</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option>Selecione o Nome do Author</option>

                            @foreach ($authores as $author)
                                <option value="{{ $author->id }}">{{ $author->name_author }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="author_id">Selecione a Editora</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option>Selecione o Nome da Editora</option>

                            @foreach ($editoras as $editora)
                                <option value="{{ $editora->id }}">{{ $editora->name_editora }}</option>
                            @endforeach
                        </select>
                    </div>

                    <section class="content">
                        <!--section textarea  -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Sinopse
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <textarea id="summernote"  name="sinopse" value="{{ old('sinopse') }}">
                                        </textarea>
                                        @error('sinopse')
                                            <div class="form-control is-invalid">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                    </section>
                    <!--fim do section textarea -->
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

    <script src="{{ asset('js/summernote-pt-BR.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2()
        });


    </script>


    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                lang: 'pt-BR',
            });
        });
    </script>

@stop
