@extends('layouts.plantilla')

@section('body')
    <h1>Este el equipo de trabajo</h1>
    <ul>
        @foreach($equipo as $item)
            <li><a href="{{route('nosotros',$item)}}" class="h4 text-danger">{{$item}}</a></li>
        @endforeach
        @if(!empty($nombre))

            @switch($nombre)
                @case($nombre == 'Ignacio')
                <h2 class="mt-5">El nombre es {{$nombre}}:</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem reprehenderit
                    voluptas?</p>
                @break
                @case($nombre == 'Pedrito')
                <h2 class="mt-5">El nombre es {{$nombre}}:</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem reprehenderit
                    voluptas?</p>
                @break
                @case($nombre == 'Juanito')
                <h2 class="mt-5">El nombre es {{$nombre}}:</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio exercitationem reprehenderit
                    voluptas?</p>
                @break
            @endswitch
        @endif
    </ul>
@endsection
