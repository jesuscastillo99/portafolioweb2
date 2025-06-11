@extends('usuario.landing')
@section('title', 'Portafolio')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')

<div style="margin-top: 7.5%;"></div>
 <div class="container-fluid mt-5 bg-light rounded-4">
  <div class="menu-icons"> <!-- Se aplica la clase aquí -->
      
  </div>
  <p class="display-4 text-center">PORTAFOLIO DE PROYECTOS</p>
                    <br>
      <!-- CARDS DE PROYECTOS -->
      <div class="row">
          <!-- Tarjeta 1 -->
          <div class="col-md-4 mb-4 ">
              <div class="card bgrosa">
                  <img src="{{ asset('assets/images/casuni.png')}}" class="card-img-top" alt="Proyecto 1">
                  <div class="card-body text-center">
                      <h5 class="card-title">Visualizador de Catálogos</h5>
                      <p class="card-text">Sistema para verificar catálogos de componentes electrónicos para la empresa CASUNI de Querétaro.</p>
                      <a href="enlace_proyecto1" target="_blank" class="btn btn-primary">Ver en GitHub</a>
                  </div>
              </div>
          </div>
  
          <!-- Tarjeta 2 -->
          <div class="col-md-4 mb-4 ">
              <div class="card bgrosa">
                  <img src="{{ asset('assets/images/videojuego.png')}}" class="card-img-top" alt="Proyecto 2">
                  <div class="card-body text-center">
                      <h5 class="card-title">Videojuego Cálculo Diferencial</h5>
                      <p class="card-text">Videojuego de preguntas sobre la materia de Cálculo Diferencial del TecNM Campus Cd. Victoria.</p>
                      <a href="enlace_proyecto2" target="_blank" class="btn btn-primary">Ver en GitHub</a>
                  </div>
              </div>
          </div>

          <!-- Tarjeta 3 -->
          <div class="col-md-4 mb-4 ">
              <div class="card bgrosa">
                  <img src="{{ asset('assets/images/albercas.png')}}" class="card-img-top" alt="Proyecto 3">
                  <div class="card-body text-center">
                      <h5 class="card-title">Sistema de Renta de Servicios "Albercas Estrada"</h5>
                      <p class="card-text">Página web de prueba desarrollada para servicios de renta de un negocio.</p>
                      <a href="enlace_proyecto3" target="_blank" class="btn btn-primary">Ver en GitHub</a>
                  </div>
              </div>
          </div>

          <!-- Tarjeta 4 -->
          <div class="col-md-4 mb-4 ">
              <div class="card bgrosa">
                  <img src="{{ asset('assets/images/lavaplus.png')}}" class="card-img-top" alt="Proyecto 4">
                  <div class="card-body text-center">
                      <h5 class="card-title">Sistema de Promoción para la app de LavaPlus</h5>
                      <p class="card-text">Págin web de molde para dar información publicitaria a las aplicaciones móviles de LavaPlus.</p>
                      <a href="https://jesus.conektacar.com/" target="_blank" class="btn btn-primary">Ver enlace</a>
                  </div>
              </div>
          </div>

          <!-- Tarjeta 5 -->
          <div class="col-md-4 mb-4 ">
              <div class="card bgrosa">
                  <img src="{{ asset('assets/images/itabec.png')}}" class="card-img-top" alt="Proyecto 5">
                  <div class="card-body text-center">
                      <h5 class="card-title">Sistema de Evidencias</h5>
                      <p class="card-text">Página web para verificar evidencias a nivel interno dentro del instituto ITABEC.</p>
                      <a href="enlace_proyecto5" target="_blank" class="btn btn-primary">Ver en GitHub</a>
                  </div>
              </div>
          </div>

          <!-- Tarjeta 6 -->
          <div class="col-md-4 mb-4 ">
              <div class="card bgrosa">
                  <img src="{{ asset('assets/images/itabec.png')}}" class="card-img-top" alt="Proyecto 6">
                  <div class="card-body text-center">
                      <h5 class="card-title">Sistema de Créditos Educativos (en desarrollo)</h5>
                      <p class="card-text">Página web interna para administrar créditos educativos (Tamaulipas).</p>
                      <a href="enlace_proyecto5" target="_blank" class="btn btn-primary">Ver en GitHub</a>
                  </div>
              </div>
          </div>
</div>

@endsection