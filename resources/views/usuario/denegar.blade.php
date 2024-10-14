@extends('layouts.landinglogin')
@section('title', 'Error')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <!-- Utiliza 'container' para centrar y 'd-flex' para establecer flexbox -->
  <div class="card text-center" style="width: 18rem;">
      <img src="{{ asset('assets/images/denegar.png')}}" class="card-img-top" alt="img_exito">
      <div class="card-body">
          <h5 class="card-title">¡ACCESO DENEGADO!</h5>
          <p class="card-text">Necesitas permisos como administrador para poder entrar a la dirección.</p>
          <button class="fill rounded" type="button" onclick="window.location.href='{{ route('iniciou') }}'">Regresar</button>
      </div>
  </div>
</div>
@endsection