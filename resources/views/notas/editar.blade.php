@extends('layouts.plantilla')

@section('body')

    <h2>Editar nota {{$nota->id}}</h2>
    {{--    Si se ejecuta el mensaje, se genera este div.--}}
    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje')}}
        </div>
    @endif

    <form action="{{route('notas.update',$nota->id)}}" method="post">
        @method('PUT')
        @csrf
        @error('nombre')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            El nombre es obligatorio.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @enderror
        @if($errors->has('descripcion'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                La descripción es obligatoria.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{$nota->nombre}}">
        <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2"
               value="{{$nota->descripcion}}">
        <button class="btn btn-warning btn-block" type="submit">Editar</button>
    </form>

@endsection
