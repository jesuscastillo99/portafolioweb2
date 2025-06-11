@extends('layouts.landingsinslider')
@section('title', 'Publicaciones')
@section('content')
<div class="container">
    <div class="container-fluid custom-altura">
        <!-- Contenido dentro del contenedor que abarca todo el ancho de la pantalla -->
        <div class="row">
            <div class="col">
            </div>
        </div>
    </div>
    <h2 class="">TODAS LAS PUBLICACIONES:</h2>
    <!-- Lista de publicaciones -->
    <div class="row">
        @foreach($publicaciones as $pub)
        <div class="col-md-4">
            <div class="card mb-4">
                
                <img src="{{ $pub->archivo ? Storage::url($pub->archivo) : ''  }}" class="card-img-top" alt="{{ $pub->titulo }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $pub->titulo }}</h5>
                    <p class="card-text ">{{ $pub->cuerpo }}</p>
                    <p class="card-text">{{ $pub->fechap }}</p>
                    <a href="{{ $pub->enlace }}" class="text-primary fw-bold" target="_blank">Ver Enlace Adjunto</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection