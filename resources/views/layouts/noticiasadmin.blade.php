@extends('layouts.landingsinslider')
@section('title', 'Noticias')
@section('content')
<div class="container-fluid custom-altura">
    <!-- Contenido dentro del contenedor que abarca todo el ancho de la pantalla -->
    <div class="row">
        <div class="col">
        </div>
    </div>
</div>

<div class="container mt-5">
    <h1 class="mb-4">Chatbot con ChatGPT</h1>
    
    @if(session('response'))
        <div class="alert alert-success">
            <strong>Respuesta:</strong> {{ session('response') }}
        </div>
    @endif
    
    <form action="{{ route('chat.ask') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question">Haz tu pregunta:</label>
            <textarea id="question" name="question" class="form-control" rows="4" required>{{ old('question') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection