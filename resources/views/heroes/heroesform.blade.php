@extends('layouts.plantilla')

@section('cuerpo')


    <h1>FORMULARIO ALTA USUARIO</h1>

    
<!--Mensaje flash -->

@if (session('heroeGuardado'))
<div class="alert alert-success">
    {{ session('heroeGuardado') }}
</div>
@endif


    <form action="{{ route('save') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nombre">Nombre :</label> 
            <input type="text" class="form-control" name="nombre" value="{{ old('nombre')}}">
        </div>
        
        <div class="form-group">
            <label for="poder">Poder :</label>
            <input type="text" class="form-control" name="poder" value="{{ old('poder')}}">
        </div>    
        <div class="form-group">
            <button class="btn btn-outline-primary" type="submit">Guardar</button>
            <button class="btn btn-outline-warning" type="reset">Limpiar</button>
        </div>
        
    </form>


@endsection
