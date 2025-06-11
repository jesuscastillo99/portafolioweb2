@extends('usuario.landing')
@section('title', 'Cobranza')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')


<div style="margin-top: 7.5%;"></div>
  <div class="container-fluid mt-5 bg-light rounded-4">
    <div class="menu-icons"> <!-- Se aplica la clase aquí -->
      <p class="fs-5 text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ullamcorper, 
                        nulla id tristique tempus, arcu tortor congue sem, et volutpat purus tortor eget dolor. Vivamus finibus 
                        feugiat eleifend. Morbi dignissim quis odio quis maximus. Duis aliquam vestibulum mauris eget bibendum. 
                        Nullam auctor tempor luctus. Quisque in rhoncus urna. Pellentesque vel ipsum ipsum. Mauris a viverra nunc. 
                        Integer ipsum ipsum, ornare id dapibus eget, venenatis pulvinar tortor. </p>
                        <br><br> 
      
    </div>
    <div class="row">
        <div class="col-4">
            <img src="{{ asset('assets/images/gal1.png')}}" alt="Imagen 1" class="img-fluid imagen-con-efecto imagen-rotadainversa">
        </div>
        <div class="col-4">
            <img src="{{ asset('assets/images/gal2.png')}}" alt="Imagen 2" class="img-fluid imagen-con-efecto imagen-rotada">
        </div>
        <div class="col-4">
            <img src="{{ asset('assets/images/gal3.png')}}" alt="Imagen 3" class="img-fluid imagen-con-efecto imagen-rotadainversa">
        </div>
      </div>
</div>

@endsection