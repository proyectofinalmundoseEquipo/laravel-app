@extends('base')
@section('title') Categorias Edit @endsection <!-- aqui se pone el titulo de la pagina -->
@section('content')

<form action="{{ route('categories.update', $categories->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }} <!-- esto es un token -->
    {{ method_field('PATCH')}}
     <div class="mb-3">
        <label for="name" class="form-label"><strong>Titulo  :</strong>  </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $categories->name}} ">
     </div>
      <div class="mb-3">
        <label for="description" class="form-label"><strong>Descripción </strong> </label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $categories->description}}</textarea>

      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
</form>



@endsection
