@extends('usuario.landing')
@section('title', 'Contratos')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')


<div style="margin-top: 7.5%;"></div>
 <div class="container-fluid mt-5 bg-light rounded-4">
  <div class="menu-icons"> <!-- Se aplica la clase aquí -->
    
  </div>
  <div class="card-body p-md-5 mx-md-4 contenedor1 text-center">
                    <p class="display-4">HABILIDADES</p>
                    <br>  
                    <h2 class="mb-4">Lenguajes de programación</h2> 
                    
                        <div class="d-flex justify-content-center">
                            <!-- Imagen de Java -->
                            <div class="p-2 bg-white rounded contenedorsombra mx-4">
                            <img src="{{ asset('assets/images/java.png')}}" alt="Java" class="">
                            </div>

                            <!-- Imagen de HTML -->
                            <div class="p-2 bgrosa bg-white rounded contenedorsombra mx-4">
                            <img src="{{ asset('assets/images/html5.png')}}" alt="HTML" class="">
                            </div>

                            <!-- Imagen de CSS -->
                            <div class="p-2 bg-white rounded contenedorsombra mx-4">
                            <img src="{{ asset('assets/images/css.png')}}" alt="CSS" class="">
                            </div>

                            <div class="p-2 bg-white rounded contenedorsombra mx-4">
                            <!-- Imagen de JavaScript -->
                            <img src="{{ asset('assets/images/js.png')}}" alt="JavaScript" class="">
                            </div>

                            <div class="p-2 bg-white rounded contenedorsombra mx-4">
                            <!-- Imagen de Php -->
                            <img src="{{ asset('assets/images/php.png')}}" alt="php" class="">
                            </div>

                        </div>

                        <br>
                    <h2 class="mb-4">Frameworks y Librerías</h2>
                        <div class="d-flex justify-content-center">
                            <!-- Imagen de Bootstrap -->
                            <div class="p-2 bg-white rounded contenedorsombra mx-4">
                            <img src="{{ asset('assets/images/bts.png')}}" alt="bts" class="">
                            </div>

                            <!-- Imagen de Laravel -->
                            <div class="p-2 bgrosa bg-white rounded contenedorsombra mx-4">
                            <img src="{{ asset('assets/images/laravel.png')}}" alt="laravel" class="">
                            </div>

                        </div>
                        <br>
                    <h2 class="mb-4">Software y tecnologías</h2>
                        <div class="d-flex justify-content-center">
                            <!-- Imagen de VS Code -->
                            <div class="p-2 bg-white rounded contenedorsombra mx-4">
                            <img src="{{ asset('assets/images/vscode.png')}}" alt="vscode" class="">
                            </div>

                            <!-- Imagen de GIT -->
                            <div class="p-2 bgrosa bg-white rounded contenedorsombra mx-4">
                            <img src="{{ asset('assets/images/git.png')}}" alt="git" class="">
                            </div>

                            <!-- Imagen de NETBEANS -->
                            <div class="p-2 bgrosa bg-white rounded contenedorsombra mx-4">
                                <img src="{{ asset('assets/images/netbeans.png')}}" alt="neatbeans" class="">
                            </div>

                        </div>

                   </div>        
                  </div>
                </div> 
</div>

@endsection