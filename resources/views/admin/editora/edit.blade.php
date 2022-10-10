@extends('adminlte::page')


@section('title', 'Editoras')

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
            <h3 class="card-title">Editar Nome da Editora</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          
            @include('admin.includes.alerts')

            <form class="form" action="{{ route('editora.update', $editora->id) }}" method="POST" >
               
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nomeeditora">Nome da Editora</label>
                    <input type="text" name="name_editora" class="form-control" id="nomeeditora" placeholder="Nome da Editora" value="{{ old('name_editora') ?? $editora->name_editora}}">
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
