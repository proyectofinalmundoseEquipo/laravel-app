@extends('base')
@section('title') Ver Categorias @endsection
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="btn btn-sm btn-primary" href="{{ route('categories.create')}}">+ Nuevo</a></li>
        </ul>

      </div>
    </div>
  </nav>

  <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>{{ 'ID' }}</th>
                    <th>{{ 'NOMBRE' }}</th>
                    <th>{{ 'ACCIONES' }}</th>
                </tr>
            </thead>

            <tbody>
                @if (count($categories) >= 1)
                    @foreach ($categories as $category)
                        <tr>
                            <td scope="row">{{ $category->id }}</td>
                            <td scope="row">{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category->id)}}" class="btn btn-sm btn-info">Detalle</a><br>
                                <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-sm btn-primary"> Editar </a><br>
                            </td>

                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td scope="row">{{'no encontro resultados'}}</td>

                    </tr>
                @endif

                <tr>

                </tr>

            </tbody>
        </table>
  </div>
@endsection

