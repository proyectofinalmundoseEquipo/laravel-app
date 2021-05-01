@extends('base')
@section('title') Post Show @endsection <!-- aqui se pone el titulo de la pagina -->
@section('content')
{{ method_field('PATCH')}}

<div>
     <div class="mb-3">
        <label for="title" class="form-label"><strong>Titulo :</strong>  {{ $post->title}} </label>

      </div>
      <div class="form-group has-feedback">
        <label class="form-label"> <strong>Categoria : </strong> {{ $post->category->name }}</label>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label"><strong>Imagen</strong> </label>
        <div>
            <img src="{{ asset('storage').'/'.$post->image}}" alt="detalle" width="300" height="200">
        </div>
      </div>


      <div class="mb-3">
        <label for="summary" class="form-label"> <strong>Resumen</strong> </label>
        <p>{{ $post->summary}}</p>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label"><strong>Descripción</strong> </label>
        <p>{{ $post->description}}</p>
      </div>

      <div class="mb-3">
        <label for="author" class="form-label"> <strong>Autor :</strong>  {{ $post->author}} </label>
      </div>

    </div>

@endsection
