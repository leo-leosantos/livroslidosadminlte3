@extends('adminlte::page')


@section('title', 'Editoras')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Visualizar dados da Editora</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('editora.index') }}">
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
            <h3 class="card-title">Visualizar Editora</h3>
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
                                    <strong>Nome da Editora</strong> : {{ $editora->name_editora }}
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td> <strong>Nome editora</strong> : {{ $editora->name_editora }}</td>
                                            <td> <strong>Data Cadastro</strong> : {{ $editora->created_at }}</td>

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
