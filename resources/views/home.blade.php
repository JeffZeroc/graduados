@extends('layouts.base')

@section('title', 'Home')


@section('baseMenu')
    <style>
        .contenedor-bienvenido{
            width: 75%;
            margin-left: 18rem;
            margin: 5rem 18rem ;
        }
        .contenedor-bienvenido h3{
            text-align: center;
            padding: 5px;
        }
        .contenedor-bienvenido img{
            width: 100%;
            padding: 5px;
        }
    </style>
          
    <div class='contenedor-bienvenido'>
        <h3>SISTEMA DE CONTROL DE LA INFORMACIÓN DE LOS ESTUDIANTES EN PROCESO DE GRADUACIÓN SEDE SANTO DOMINGO. </h3>
        <img src="{{URL::asset('img/bienvenidos.jpg')}}" alt='img-Bienvenidos'  class='imgSombra'>
    </div>
@endsection