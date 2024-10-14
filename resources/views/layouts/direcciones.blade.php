@extends('layouts.landingsinslider')
@section('title', 'Elementos')
@section('content')
<!-- section -->
<div class="section margin-top_50">
    <div class="container">
        <div class="row">
            @foreach($direcciones as $dir)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Dirección:</h5>
                        <p class="card-text">{{ $dir->nombredire }}</p>
                        <a href="{{ route('trimestres', ['iddireccion' => $dir->iddireccion]) }}" class="btn btn-primary">Ver Evidencias</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end section -->
@endsection
