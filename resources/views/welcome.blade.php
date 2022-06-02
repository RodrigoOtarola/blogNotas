@extends('layouts.plantilla')
@section('body')
    <h1>Notas</h1>

    {{--    Si se ejecuta el mensaje, se genera este div.--}}
    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje')}}
        </div>
    @endif

    <form action="{{route('notas.crear')}}" method="post">
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
        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{old('nombre')}}">
        <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2"
               value="{{old('descripcion')}}">
        <button class="btn btn-primary btn-block" type="submit">Agregar</button>
    </form>
    <div class="container my-4">
        <h1 class="display-4">Notas</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notas as $nota)
                <tr>
                    <th scope="row">{{$nota->id}}</th>
                    <td><a href="{{route('notas.detalle',$nota)}}">{{$nota->nombre}}</a></td>
                    <td>{{$nota->descripcion}}</td>
                    <td><a href="{{route('notas.editar',$nota)}}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{route('notas.eliminar',$nota)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        Para hacer paginación, si no se coloca el parametro en () se veran cuadros gigantescos.--}}
        {{$notas->links('pagination::bootstrap-4')}}
    </div>
@endsection
