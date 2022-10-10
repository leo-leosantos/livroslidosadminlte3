@extends('adminlte::page')


@section('title', 'Editoras')

@section('content_header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              
                <div class="col-sm-12">
                    <a href="{{ route('editora.create') }}">
                        <button type="button" class="btn btn-outline-success  float-right"><i class="far fa-plus-square"></i>
                            Cadastrar Nova Editora
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
            <h3 class="card-title">Lista de Editoras Cadastradas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome Editora</th>
                        <th>Cadastrado por:</th>
                        <th>Data Criação</th>

                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($editoras as $editora)
                        <tr>
                            <td>{{ $editora->name_editora }}</td>
                            <td>{{ $editora->user->name }}</td>
                            <td>{{ $editora->created_at }}</td>

                            <td>
                                <a href="{{ route('editora.show', $editora->id) }}" class="btn btn-info">

                                    <i class="far fa-eye"></i> Visualizar
                                </a>
                                <a href="{{ route('editora.edit', $editora->id) }}" class="btn btn-warning">

                                    <i class="fas fa-edit"></i> Editar
                                </a>

                            </td>
                                <td>
                                    <form action="{{ route('editora.destroy', ['editora' => $editora->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="btn btn-danger"><i class="fas fa-trash"></i> Excluir
                                        </button>
                                    </form>

                                </td>
                        </tr>
                    @empty
                        <tr>
                            <td> Nenhuma Editora cadastrada</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome Editora</th>
                        <th>Data Criação</th>
                        <th>Cadastrado</th>

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
            $("#example1").DataTable({
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
