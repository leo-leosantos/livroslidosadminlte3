@extends('adminlte::page')


@section('title', 'Phrases')

@section('content_header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <a href="{{ route('phrase.index') }}">
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
            <h3 class="card-title">Cadastar Nova Phrase</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            @include('admin.includes.alerts')

            <form class="form" action="{{ route('phrase.store') }}" method="POST" >

                @csrf
                <div class="form-group">
                    <label for="phrase_motivacional">Frase</label>
                    <input type="text" name="phrase" class="form-control" id="phrase_motivacional" placeholder="Frase Motivacional" value=" {{ old('phrase') }}">
                </div>
                <div class="form-group">
                    <label for="author_frase_motivacioonal">Author da Frase</label>
                    <input type="text" name="author_phrase" class="form-control" id="author_frase_motivacioonal" placeholder="Author da Frase" value=" {{ old('author_phrase') }}">
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
