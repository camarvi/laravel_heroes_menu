@extends('layouts.plantilla')

@section('cuerpo')
    <h1>Editar Registro</h1>

    <hr>

    <!--Mensaje flash -->

    @if (session('heroeModificado'))
    <div class="alert alert-success">
        {{ session('heroeModificado') }}
    </div>
    @endif

    <div class="container">
        <form action="{{ route('update' , $heroe->id ) }}" method="POST">

            @csrf @method('PATCH')
        
            <div class="form-group">
                <label for="nombre">Nombre :</label> 
                <input type="text" class="form-control" name="nombre" value="{{ $heroe->nombre }}">
            </div>
            
            <div class="form-group">
                <label for="poder">Poder :</label>
                <input type="text" class="form-control" name="poder" value="{{ $heroe->poder }}">
            </div>    
            <div class="form-group">
                <button class="btn btn-outline-primary" type="submit">Modificar</button>
                <button class="btn btn-outline-warning" type="reset">Limpiar</button>
            </div>

        </form>
    </div>

@endsection