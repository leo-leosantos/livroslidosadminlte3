@extends('adminlte::page')


@section('title', 'Phrase')

@section('content_header')

    <div class=>
        <a href="{{ route('phrase.index') }}" class="btn btn-outline-success">
            <i class="fas fa-fast-backward"></i>
            Voltar
        </a>
    </div>



@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title">Editar Frase Motivacional</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            @include('admin.includes.alerts')

            <form class="form" action="{{ route('phrase.update', $phrase->id) }}" method="POST" >

                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="phrase_motivacional">Frase</label>
                    <input type="text" name="phrase" class="form-control" id="phrase_motivacional" placeholder="Frase Motivacional" value="{{ old('phrase') ?? $phrase->phrase}}">
                </div>
                <div class="form-group">
                    <label for="author_frase_motivacioonal">Author da Frase</label>
                    <input type="text" name="author_phrase" class="form-control" id="author_frase_motivacioonal" placeholder="Author da Frase" value="{{ old('author_phrase') ?? $phrase->author_phrase}}">
                </div>
                    <div class="form-group">
                        <label>Ativo</label>
                                   <input type="checkbox"  data-bootstrap-switch
                                   name="active" {{ (old('active') == 'on' || old('active') == true ? 'checked' : ($phrase->active == true ? 'checked' : '')) }}>

                        @error('active')
                            <div class="form-control is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-warning">Editar</button>
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
