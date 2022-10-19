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
            <table id="editora" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome Editora</th>
                        <th>Cadastrado por:</th>
                        <th>Data Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($editoras as $editora)
                        <tr>
                            <td>{{ $editora->name_editora }}</td>
                            <td>{{ $editora->user->name }}</td>
                            <td>{{ $editora->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('editora.show', $editora->id) }}" class="btn btn-info mr-1">
                                        <i class="far fa-eye"></i> Visualizar
                                    </a>
                                    <br>
                                    <a href="{{ route('editora.edit', $editora->id) }}" class="btn btn-warning mr-1">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <br>
                                    <form action="{{ route('editora.destroy', ['editora' => $editora->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                            Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    @endforeach
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




@section('js')


<script>
    $(document).ready(function() {
        $('#editora').DataTable({
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



@endsection
