@extends('adminlte::page')
@section('title', 'Authores')
@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('author.create') }}">
                        <button type="button" class="btn btn-outline-success  float-right"><i class="far fa-plus-square"></i>
                            Cadastrar Novo Author
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
            <h3 class="card-title">Lista de Authores Cadastradas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="author" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome Author</th>
                        <th>Cadastrado por:</th>
                        <th>Data Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($authores as $author)
                        <tr>
                            <td>{{ $author->name_author }}</td>
                            <td>{{ $author->user->name }}</td>
                            <td>{{ $author->created_at }}</td>

                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('author.show', $author->id) }}" class="btn btn-info mr-1">
                                        <i class="far fa-eye"></i> Visualizar
                                    </a>
                                    <br>
                                    <a href="{{ route('author.edit', $author->id) }}" class="btn btn-warning mr-1">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <br>
                                    <form action="{{ route('author.destroy', ['author' => $author->id]) }}" method="post">
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
                            <td> Nenhuma Author cadastrado</td>
                        </th>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome Author</th>
                        <th>Cadastrado por:</th>
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
        $(function() {
            $("#author").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
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
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
