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
                        <th>Nome Author</th>
                        <th>Data Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    {{--  @forelse($books as $book )
                    <tr>
                        <td></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="1000">
                            Sem nenhum curso
                        </td>
                    </tr>
                @endforelse  --}}
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
