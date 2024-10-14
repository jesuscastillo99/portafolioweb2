@extends('layouts.landingsinslider')
@section('title', 'Elementos')
@section('content')
 <!-- section -->
 <div class="section margin-top_50">
    <div class="container">
        <h2 class="">TODOS LOS ELEMENTOS DE CONTROL:</h2>
        <div class="row">
            @foreach($elementos as $ele)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Elemento:</h5>
                        <p class="card-text">{{ $ele->numelemento }}</p>
                        
                        <!-- Mostrar las direcciones en un select -->
                        <select class="form-select mt-2" name="direccion_{{ $ele->idelemento }}">
                            @foreach($ele->direcciones as $direccion)
                            <option value="{{ $direccion->iddireccion }}">{{ $direccion->nombredire }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end section -->
@endsection