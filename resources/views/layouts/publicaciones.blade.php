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
    <h2 class="">CREAR NUEVA PUBLICACIÓN:</h2>
    <!-- Formulario para crear o editar publicaciones -->
    <div class="card mb-4">
        <div class="card-header">{{ $publicacion ? 'Editar Publicación' : 'Crear Publicación' }}</div>
        <div class="card-body">
            <form action="{{ $publicacion ? route('publicaciones.update', $publicacion->idpublicacion) : route('publicaciones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($publicacion)
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" name="titulo" value="{{ $publicacion->titulo ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label for="cuerpo" class="form-label">Cuerpo</label>
                    <textarea class="form-control" name="cuerpo" rows="3" required>{{ $publicacion->cuerpo ?? '' }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="archivo" class="form-label">Archivo (Imagen)</label>
                    <input type="file" class="form-control" name="archivo" required>
                </div>

                <div class="mb-3">
                    <label for="enlace" class="form-label">Enlace</label>
                    <input type="url" class="form-control" name="enlace" value="{{ $publicacion->enlace ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label for="fechap" class="form-label">Fecha de Publicación</label>
                    <input type="date" class="form-control" name="fechap" value="{{ $publicacion->fechap ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label for="año" class="form-label">Año</label>
                    <input type="number" class="form-control" name="año" value="2024" readonly required>
                </div>

                <button type="submit" class="btn btn-form">{{ $publicacion ? 'Actualizar' : 'Crear' }}</button>
                @if($publicacion)
                    <a href="{{ route('publicaciones.index') }}" class="btn btn-secondary">Cancelar</a>
                @endif
            </form>
        </div>
    </div>

    <h2 class="">ÚLTIMAS PUBLICACIONES:</h2>
    <!-- Lista de publicaciones -->
    <div class="row">
        @foreach($publicaciones as $pub)
        <div class="col-md-4">
            <div class="card mb-4">
                
                <img src="{{ $pub->archivo ? Storage::url($pub->archivo) : ''  }}" class="card-img-top" alt="{{ $pub->titulo }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $pub->titulo }}</h5>
                    <p class="card-text text-ajuste1">{{ $pub->cuerpo }}</p>
                    <p class="card-text">{{ $pub->fechap }}</p>
                    <a href="{{ $pub->enlace }}" class="btn btn-form2" target="_blank">Ver Enlace</a>
                    <a href="{{ route('publicaciones.index', ['publicacion' => $pub->idpublicacion]) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('publicaciones.destroy', $pub->idpublicacion) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mb-5">
        <a href="{{ route('mostrarpublis') }}" class="btn btn-form">Mostrar todas las publicaciones</a>
    </div>
    
</div>
@endsection