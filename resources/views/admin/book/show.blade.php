@extends('adminlte::page')


@section('title', 'Authores')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Visualizar dados do Author</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Visualizar livro: <strong> {{ $book->title }}</strong> </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <section class="content">
                <!--section textarea  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <strong>Título</strong>: {{ $book->title }}
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td> <strong>Nome do Author</strong>: {{ $book->author->name_author }}</td>
                                            <td> <strong>Data Do Ínico da Leitura</strong>: {{ $book->created_at }}</td>
                                            <td> <strong>Editora</strong>: {{ $book->editora->name_editora }}</td>
                                        </tr>
                                        <tr>
                                            <td> <strong>Número de Páginas</strong> : {{ $book->page_number }}</td>
                                            <td> <strong>serie</strong>: {{ $book->serie }}</td>
                                            <td> <strong>Volume</strong>: {{ $book->volume }}</td>

                                        </tr>
                                        <tr>

                                            <td> <strong>Data do Fim da Leitura</strong>: {{ $book->date_start_reading }}</td>
                                            <td> <strong>Data do Fim da Leitura</strong>: {{ $book->date_start_reading }}</td>
                                            <td> <strong>Tempo de Leitura</strong>: 0 </td>
                                        </tr>



                                    </thead>
                                </table>

                                <table class="table  table-bordered rounded">
                                    <thead>
                                        <tr>
                                            <td align="center">
                                                <div class="container-fluid card mb-3"><strong> Sinopse</strong>
                                                    <hr>
                                                    <div class=" card-body mb-5">   {!! $book->synopses !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </section>

        </div>
        <!-- /.card-body -->
    </div>
@stop
