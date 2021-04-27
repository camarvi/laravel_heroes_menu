@extends('layouts.plantilla')

@section('cuerpo')
    
    <h1>Buscar Heroes</h1>

    <div class="container">
        <form action="{{ route('mostrar')}}" method="POST">
            @csrf @method('GET')
            <div class="form-group">
                <label for="nombre">Nombre :</label> 
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
                <button class="btn btn-outline-warning" type="reset">Limpiar</button>
            </div>
        </form>
    </div>

@endsection

