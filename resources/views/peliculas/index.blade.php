@extends('layouts.app')

@section('titulo', 'Lista de películas')

@section('contenido')
    <a class="btn btn-primary m-3" href="{{ route('pelicula.create' )}}" role="button">Crear Pelicula</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Imagenes</th>
            <th scope="col">Trailer</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($peliculas as $peliculas)
                <th scope="row">{{ $peliculas->id }}</th>
                    <td>{{ $peliculas->nombre }}</td>
                    <td>{{ $peliculas->descripcion }}</td>
                    <td>{{ $peliculas->imagen }}</td>
                    <td>{{ $peliculas->trailer }}</td>
                    <td>
                      <a class="btn btn-primary" href="{{ route('pelicula.edit',$peliculas->id)}}" role="button">Editar </a>
                      <a class="btn btn-danger" href="#" 
                        onclick="event.preventDefault(); document.getElementById('delete-form{{$peliculas->id}}').submit();">
                        Eliminar 
                      </a>
                      <form action="{{ route('pelicula.destroy',$peliculas->id)}}" method="POST" id="delete-form{{$peliculas->id}}" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form> 
                    </td>
                </tr> 
            @endforeach
          
          
        </tbody>
        @endsection
 