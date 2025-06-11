<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="images/png" href="{{ asset('assets/images/escudotam_2023.ico')}}">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" media="all" href="{{ asset('assets/styles.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/pogo-slider.min.css')}}" />
    <!-- Site CSS -->
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/responsive.css')}}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/custom.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/style.css')}}" />
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="d-flex flex-column min-vh-100">
    
    <nav class="navbar navbar-expand-lg fixed-top bg-light" aria-label="Light offcanvas navbar">
        <div class="container-fluid">
          
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
            <div class="offcanvas-header">
              <img src="{{ asset('assets/images/logo-itabec.png')}}" class="img-fluid" alt="image_logo" />
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-center flex-grow-1 pe-1">

                <li class="nav-item">
                    <a class="nav-link mx-lg-2 {{ Route::currentRouteName() == 'inicio' ? 'active' : '' }}" href="{{ route('inicio') }}">Inicio</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 {{ Route::currentRouteName() == 'cobranza' ? 'active' : '' }}" href="{{ route('sobremi') }}">Sobre mí</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 {{ Route::currentRouteName() == 'cartera' ? 'active' : '' }}" href="{{ route('portafolio') }}">Portafolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 {{ Route::currentRouteName() == 'pagos' ? 'active' : '' }}" href="{{ route('educacion') }}">Educación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 {{ Route::currentRouteName() == 'contratos' ? 'active' : '' }}" href="{{ route('habilidades') }}">Habilidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 {{ Route::currentRouteName() == 'seguimiento' ? 'active' : '' }}" href="{{ route('contacto') }}">Contacto</a>
                </li>
                

              </ul>

            </div>

          </div>
            <form id="logout-form" action="{{ route('logout2') }}" method="POST" style="display: none;">
            @csrf
            </form>
            
            <a href="#" class="login-button btnlogout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Salir
            </a>
          
        </div>
        
      </nav>
      <!-- End Navbar -->

      <!-- 🛠 Espaciado para que el segundo navbar no se solape -->
        

      
    

    <!-- Start Content -->
    <main class="flex-grow-1">
        <div class="container">
            
            @yield('content')
        </div>
    </main>
    <!-- End Content -->

    <!-- Start Footer -->
    
    <!-- End Footer -->
</body>


<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="crp">© Copyrights 2025 Diseñado por Jesús</p>
            </div>
        </div>
    </div>
</div>
    <!-- ALL JS FILES -->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/form.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script> 
    <script src="{{ asset('assets/js/jquery.pogo-slider.min.js')}}"></script>
    <script src="{{ asset('assets/js/slider-index.js')}}"></script>
    {{-- <script src="{{ asset('assets/js/smoothscroll.js')}}"></script> --}}
    <script src="{{ asset('assets/js/isotope.min.js')}}"></script>
    <script src="{{ asset('assets/js/images-loded.min.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</html>