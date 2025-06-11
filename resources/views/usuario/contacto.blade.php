@extends('usuario.landing')
@section('title', 'Seguimiento')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')


<div style="margin-top: 7.5%;"></div>
 <div class="container-fluid mt-5 bg-light rounded-4">
    <div class="menu-icons"> <!-- Se aplica la clase aquí -->
        
    </div>
    <p class="display-4">CONTÁCTAME</p>
                    <br>

                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center p-2">
                            <i class="bi bi-envelope-fill p-2 mb-1"></i>
                            <h3 class="ml-2">Correo electrónico:</h3>
                            <h4 class="p-2 text-decoration-underline colort mb-4">jesusalberto990@gmail.com</h4>
                        </div>
                    
                        <div class="d-flex align-items-center p-2">
                            <i class="bi bi-linkedin p-2 mb-1"></i>
                            <h3 class="ml-2">LinkedIn:</h3>
                            <h4 class="p-2 mb-4"><a href="https://www.linkedin.com/in/jesuscastillo3010/" target="_blank" class="colort">https://www.linkedin.com/in/jesuscastillo3010/</a></h4>
                        </div>

                        <div class="d-flex align-items-center p-2">
                            <i class="bi bi-github p-2 mb-1"></i>
                            <h3 class="ml-2">Github:</h3>
                            <h4 class="p-2 mb-4"><a href="https://github.com/jesuscastillo99" target="_blank" class="colort">https://github.com/jesuscastillo99</a></h4>
                        </div>

                        <div class="d-flex align-items-center p-2">
                            <i class="bi bi-whatsapp p-2 mb-1"></i>
                            <h3 class="ml-2">WhatsApp:</h3>
                            <h4 class="p-2 mb-4 text-decoration-underline colort">+524811159534</h4>
                        </div>
                    </div>

  </div>
</div>

@endsection