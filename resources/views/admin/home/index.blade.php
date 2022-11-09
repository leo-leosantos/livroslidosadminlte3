
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                    <i class="fas fa-book"></i>
                    {{$books}}
            </h3>
              <p>Livros Lidos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>  <i class="fas fa-building"></i> {{ $editoras}} </h3>

              <p>Editoras Cadastradas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $authores}}</h3>

              <p>Autores Cadastrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $pagesread }}</h3>

              <p>Páginas Lidas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </div><!-- /.container-fluid -->
  </section>


  <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title ">Frase Motivacional </h3>
            </div>
            <div class="card-body">
                @if ($phrase)
                    <strong> {!! $phrase->phrase !!} </strong><br>
                    <strong>Autor: {{ $phrase->author_phrase }}</strong><br>

                @else
                    <strong class="text-danger"> Nenhuma frase com o status Ativo</strong>
                @endif
            </div>
        </div>
    </div>
</section>
@stop



@section('js')
    <script> console.log('Hi!'); </script>
@stop
