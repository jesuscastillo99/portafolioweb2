@extends('usuario.landing')
@section('title', 'Inicio')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
 <!-- LOADER -->
 <div style="margin-top: 7.5%;"></div>

 <!-- Contenido de la página -->
 <div class="card-body p-md-5 mx-md-4 contenedor1 text-right">
    <p class="display-2 animate__animated animate__backInDown">JESUS CASTILLO</p>
        <div class="d-inline-block">
        <p class="typewriter pazul fs-2 " id="mensaje">En camino a ser un desarrollador web.</p>
        </div>
    <br>
    <p class="fs-4 animate__animated animate__backInDown">BIEVENID@ A MI PORTAFOLIO DE PROYECTOS COMO PROGRAMADOR.</p>   
    <br>
    <a class="asinunderline" href="{{ asset('assets/files/curriculum.pdf')}}" download="curriculum.pdf">
    <button class="button-53 animate__animated animate__backInDown" role="button">DESCARGA MI CV</button>   
    </a>
  </div>



@endsection