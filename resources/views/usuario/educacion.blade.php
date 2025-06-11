@extends('usuario.landing')
@section('title', 'Educacion')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')


<div style="margin-top: 7.5%;"></div>
 <div class="container-fluid mt-5 bg-light rounded-4">
  <div class="menu-icons"> <!-- Se aplica la clase aquí -->
  </div>
    <div class="col-lg-12">
                  <div class="card-body p-md-5 mx-md-4 contenedor1 text-center">
                    <p class="display-4">EDUCACIÓN</p>
                    <br>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h4 class="text-info">Ing. en Sistemas Computacionales</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="text-white">Fecha: Agosto 2018 - Julio 2023</p>
                        </div>
                        <div class="col-md-12">
                            <p>Egresado del TecNM Campus Cd. Victoria, Tamaulipas.</p>
                            <a href="enlace_proyecto1" class="btn btn-primary">Ver documento</a>
                        </div>
                    </div>
                
                    <!-- Nivel 2 -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h4 class="text-info">Técnico en Programación</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="text-white">Fecha: Agosto 2015 - Junio 2018</p>
                        </div>
                        <div class="col-md-12">
                            <p>Egresado del CBTIS No. 46 Cd. Valles, S.L.P.</p>
                            <a href="enlace_proyecto1" class="btn btn-primary">Ver documento</a>
                        </div>
                    </div>
                
                  </div>
  </div>
</div>

@endsection