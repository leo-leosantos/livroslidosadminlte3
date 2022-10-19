@extends('adminlte::page')

@section('title', 'Livros')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <a href="{{ route('book.create') }}">
                        <button type="button" class="btn btn-outline-success  float-right"><i class="far fa-plus-square"></i>
                            Cadastrar Novo Livro
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
            <h3 class="card-title">Lista dos Livros Cadastradas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="editora" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Livro</th>
                        <th>Editora</th>
                        <th>Author</th>
                        <th>Início da Leitura</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->editora->name_editora }}</td>
                            <td>{{ $book->author->name_author }}</td>
                            <td>{{ $book->date_start_reading }}</td>
                            <td>
                                <div class="btn-group mr-1">
                                    <a href="{{ route('book.show', $book->id) }}" class="btn btn-info mr-1">
                                        <i class="far fa-eye"></i> Visualizar
                                    </a>
                                    <br>
                                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning mr-1">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <br>
                                    <form action="{{ route('book.destroy', ['book' => $book->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mr-1"><i class="fas fa-trash"></i>
                                            Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome do Livro</th>
                        <th>Editora</th>
                        <th>Author</th>
                        <th>Início da Leitura</th>
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
