@extends('layouts.landingsinslider')
@section('title', 'Elementos')
@section('content')
<!-- section -->
<div class="section margin-top_50">
    <div class="container">
        <h2 class="">ELEMENTOS POR DIRECCIÓN:</h2>
        <div class="row">
            @foreach($elementos as $ele)
            <div class="col-md-4">
                <div class="card mb-4 {{ $ele->isGreen ? 'bg-success text-white' : '' }}">
                    <div class="card-body">
                        <h5 class="card-title">Elemento:</h5>
                        <p class="card-text">{{ $ele->numelemento }}</p>
                        <a href="{{ route('evidencias', ['iddireccion' => $iddireccion, 'idtrimestre' => $idtrimestre, 'idelemento' => $ele->idelemento]) }}" class="btn btn-form">Ver Evidencias</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end section -->
@endsection

