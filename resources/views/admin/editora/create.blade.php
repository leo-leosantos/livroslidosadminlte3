@extends('adminlte::page')


@section('title', 'Editoras')

@section('content_header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              
                <div class="col-sm-12">
                    <a href="{{ route('editora.index') }}">
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
            <h3 class="card-title">Cadastar Nova Editora</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          
            @include('admin.includes.alerts')

            <form class="form" action="{{ route('editora.store') }}" method="POST" >
               
                @csrf
                <div class="form-group">
                    <label for="nomeeditora">Nome da Editora</label>
                    <input type="text" name="name_editora" class="form-control" id="nomeeditora" placeholder="Nome da Editora" value=" {{ old('name_editora') }}">
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
