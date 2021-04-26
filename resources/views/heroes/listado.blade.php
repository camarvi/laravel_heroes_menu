@extends('layouts.plantilla')

@section('cuerpo')

<div class="container text-center"></div>
<h1>Listado Heroes</h1>
<hr>

<!--Mensaje flash -->

@if (session('heroeEliminado'))
<div class="alert alert-success">
    {{ session('heroeEliminado') }}
</div>
@endif


<div class="container">

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Poder</th>
        <th scope="col">Editar</th>
        <th scope="col">Borrar</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($heroes as $heroe)
           
      <tr>
        <th scope="row">{{ $heroe->id}}</th>
        <td>{{ $heroe->nombre }}</td>
        <td>{{ $heroe->poder }}</td>
        <td>
            <a href="{{ route('editform', $heroe->id )}}">
            <button class="btn btn-info mr-1">
                <i class="fa fa-pen"></i>
            </button>
            </a>
        </td>
        <td>    
            <form  width='20px' action="{{ route('eliminar', $heroe->id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('¿Eliminar definitivamente?');">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </td>
      </tr>
      @endforeach 
     </tbody>
  </table>

</div>
@endsection