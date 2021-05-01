@extends('base')
@section('title') Inicio @endsection
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="btn btn-sm btn-primary" href="{{ route('post.create')}}">+ Nuevo</a></li>
        </ul>
       <form action="{{ route('post.search')}}" method="POST" class="d-flex">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar">
            <span class="input-group-btn">
                <button class="btn btn-outline-info" type="submit"><span class="fas fa-search" aria-hidden="true"></span>
                    BUSCAR
                </button>
            </span>
        </div>
    </form>

      </div>
    </div>
  </nav>

  <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>{{ 'ID' }}</th>
                    <th>{{ 'CATEGORIA' }}</th>
                    <th>{{ 'IMAGEN' }}</th>
                    <th>{{ 'TITLE' }}</th>
                    <th>{{ 'AUTHOR' }}</th>
                    <th>{{ 'ACCIONES' }}</th>
                </tr>
            </thead>
            <tbody>
                @if (count($posts) >= 1)
                    @foreach ($posts as $post)
                        <tr>
                            <td scope="row">{{ $post->id }}</td>
                            <td scope="row">{{ $post->category->name }}</td>
                            <td scope="row"><img src="{{ asset('storage').'/'.$post->image }}" alt="" width="100"></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->author }}</td>
                            <td>
                                <a href="{{ route('post.show', $post->id)}}" class="btn btn-sm btn-info">Detalle</a><br>
                                <a href="{{ route('post.edit', $post->id)}}" class="btn btn-sm btn-primary"> Editar </a><br>
                                <form action="{{ route('post.destroy', $post->id)}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este registro?')">Eliminar</button>
                                </form>

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
