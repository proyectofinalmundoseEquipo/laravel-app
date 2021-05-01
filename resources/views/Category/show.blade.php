@extends('base')
@section('title') Categorias Show @endsection <!-- aqui se pone el titulo de la pagina -->
@section('content')
{{ method_field('PATCH')}}

<div>
     <div class="mb-3">
        <label for="title" class="form-label"><strong>Titulo :</strong>  {{ $categories->name}} </label>
     </div>
      <div class="mb-3">
        <label for="description" class="form-label"><strong>Descripción</strong> </label>
        <p>{{ $categories->description}}</p>
      </div>

</div>

@endsection
