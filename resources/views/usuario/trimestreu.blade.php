@extends('usuario.landingsinslider')
@section('title', 'Trimestre Usuario')
@section('content')
 <!-- section -->
 <div class="section margin-top_50">
    <div class="container">
        <h2 class="">TRIMESTRES:</h2>
        <h4 class="">DIRECCIÓN: {{ $iddireccion }}</h4>
        <div class="row">
            @foreach($trimestres as $tri)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Trimestre:</h5>
                        <p class="card-text">{{ $tri->meses }}</p>
                        <p class="card-text">{{ $tri->año }}</p>
                        <a href="{{ route('elementosu', ['iddireccion' => $iddireccion, 'idtrimestre' => $tri->idtrimestre]) }}" class="btn btn-primary">Ver Elementos</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end section -->
@endsection
