@extends('adminlte::page')
@section('title', 'Frases Motivacional')
@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('phrase.create') }}">
                        <button type="button" class="btn btn-outline-success  float-right"><i class="far fa-plus-square"></i>
                            Cadastrar Nova Frase Motivacional
                        </button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop
@include('admin.includes.alerts')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Frases Cadastradas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="phrase" class="table table-bordered table-striped">
                <thead>
                    <tr>
                         <th>Frase</th>
                         <th>Autor da Frase</th>
                        <th>Data Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($phrases as $phrase)
                        <tr>
                            <td>{{ $phrase->phrase }}</td>
                            <td>{{ $phrase->author_phrase }}</td>
                            <td>{{ $phrase->created_at }}</td>

                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('phrase.show', $phrase->id) }}" class="btn btn-info mr-1">
                                        <i class="far fa-eye"></i> Visualizar
                                    </a>
                                    <br>
                                    <a href="{{ route('phrase.edit', $phrase->id) }}" class="btn btn-warning mr-1">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <br>
                                    <form action="{{ route('phrase.destroy', ['phrase' => $phrase->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                            Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <th>
                            <td> Nenhuma Frase cadastrada</td>
                        </th>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>Frase</th>
                        <th>Autor da Frase</th>
                        <th>Data Criação</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#phrase').DataTable({
                "language": {
                    "search": "Pesquisar",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "paginate": {
                            "previous": "Anterior",
                            "next": "Próximo",
                            "first": "Primeiro",
                            "last": "Último"
                    }
                }
            });
        });
    </script>
@stop
