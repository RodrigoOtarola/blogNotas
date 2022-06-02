@extends('layouts.plantilla')

@section('title','Notas | nota ' .$nota->id)

@section('body')
    <h2>Detalle nota:</h2>
    <p>Nombre: {{$nota->id}}</p>
    <p>Nombre: {{$nota->nombre}}</p>
    <p>Detalle: {{$nota->descripcion}}</p>
@endsection
