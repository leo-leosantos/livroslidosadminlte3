@extends('adminlte::page')


@section('title', 'Editoras')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Visualizar dados da Frase</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('phrase.index') }}">
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
            <h3 class="card-title">Visualizar Frase</h3>
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
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td> <strong>Frase</strong> : {{ $phrase->phrase }}</td>
                                        </tr>
                                        <tr>
                                            <td> <strong>Author</strong> : {{ $phrase->author_phrase }}</td>
                                            <td> <strong>Data Cadastro</strong> : {{ $phrase->created_at }}</td>
                                        </tr>
                                    </thead>
                                </table>

                            </div>
                            <div class="card-body">
                                <form action="{{ route('phrase.destroy', ['phrase' => $phrase->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="btn btn-danger"><i class="fas fa-trash"></i> Excluir
                                    </button>
                                </form>
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
