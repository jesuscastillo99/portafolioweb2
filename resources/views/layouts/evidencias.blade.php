@extends('layouts.landingsinslider')
@section('title', 'Evidencias')
@section('content')
<!-- section -->
<div class="section margin-top_50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-left">EVIDENCIAS</h1>
                <h3 class="text-left">
                    @if($iddireccion == 1)
                        Direccion de Evaluacion y Sistemas
                    @elseif($iddireccion == 2)
                        Direccion de Administracion y Finanzas
                    @elseif($iddireccion == 3)
                        Direccion de Promocion y Servicios
                    @elseif($iddireccion == 4)
                        Direccion de Cartera y Recuperacion
                    @else
                        Trimestre desconocido
                    @endif
                </h3>
                <h3 class="text-left">
                    @if($idtrimestre == 1)
                        ENERO-MARZO-2024
                    @elseif($idtrimestre == 2)
                        ABRIL-JUNIO-2024
                    @elseif($idtrimestre == 3)
                        JULIO-SEPTIEMBRE-2024
                    @elseif($idtrimestre == 4)
                        OCTUBRE-DICIEMBRE-2024
                    @else
                        Trimestre desconocido
                    @endif
                </h3>
                <h3 class="text-left">ELEMENTO {{ $idelemento }}</h3>
            </div>
            <div class="text-end">
                         <a href="{{ route('elementos2', ['iddireccion' => $iddireccion, 'idtrimestre' => $idtrimestre]) }}" class="btn btn-form m-2">Ver Elementos</a>
                        </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($evidencias as $evidencia)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="border p-3 mb-3">
                                @if($evidencia->archivoe && $evidencia->estadoap == 1)
                                    <img src="{{ asset('assets/images/folder_error.png') }}" class="img-fluid" alt="Imagen" 
                                    data-bs-toggle="modal" data-bs-target="#pdfModal" 
                                    onclick="openPdf('{{ asset('evidencias/' . $evidencia->archivoe) }}')">

                                    @elseif($evidencia->archivoe && $evidencia->estadoap == 2)
                                    <img src="{{ asset('assets/images/folder_revision.png') }}" class="img-fluid" alt="Imagen" 
                                    data-bs-toggle="modal" data-bs-target="#pdfModal" 
                                    onclick="openPdf('{{ asset('evidencias/' . $evidencia->archivoe) }}')">

                                    @elseif($evidencia->archivoe && $evidencia->estadoap == 3)
                                    <img src="{{ asset('assets/images/folder_aprobado.png') }}" class="img-fluid" alt="Imagen" 
                                    data-bs-toggle="modal" data-bs-target="#pdfModal" 
                                    onclick="openPdf('{{ asset('evidencias/' . $evidencia->archivoe) }}')">

                                    @elseif($evidencia->archivoe == null)
                                    <img src="{{ asset('assets/images/folder_sin.png')}}" class="img-fluid m-3" alt="Imagen">
                                @endif
                            </div>
                            <p>Usuario:</p>
                            <form action="{{ route('comentario.storeOrUpdate', $evidencia->idevidencia) }}" method="POST">
                                @csrf
                                <textarea type="text" class="form-control mb-2" placeholder="Comentario usuario" readonly rows="5">{{ $evidencia->comentario2->comentario ?? 'Sin comentario' }}</textarea>
                                <p>Revisión:</p>
                                <textarea name="comentario" class="form-control mb-2" placeholder="Escribe un comentario" rows="5">{{ $evidencia->comentario->comentario ?? 'Sin comentario' }}</textarea>
                                <select class="form-control mb-2" id="estadoap" name="estadoap">
                                    <option value="1" {{ $evidencia->estadoap == 1 ? 'selected' : '' }}>NO APROBADO</option>
                                    <option value="2" {{ $evidencia->estadoap == 2 ? 'selected' : '' }}>EN REVISION</option>
                                    <option value="3" {{ $evidencia->estadoap == 3 ? 'selected' : '' }}>APROBADO</option>
                                </select>
                                <button type="submit" class="btn btn-form w-100 mb-2">Actualizar datos</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Modal para visualizar el PDF -->
        <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="pdfModalLabel">Previsualización de PDF</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Aquí se cargará el PDF -->
                  <iframe id="pdfIframe" src="" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
        </div>
        
        
    </div>
</div>
<script>
    function openPdf(pdfUrl) {
      // Establece la URL del PDF en el iframe dentro del modal
      document.getElementById('pdfIframe').src = pdfUrl;
    }
  </script>
  
  <script>
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(event) {
            // Obtiene el archivo seleccionado
            const file = event.target.files[0];
            const fileNameSpan = document.querySelector('#file-name-' + event.target.id.split('-')[1]);

            if (file) {
                // Actualiza el span con el nombre del archivo
                fileNameSpan.textContent = file.name;
            } else {
                // Si no hay archivo seleccionado, muestra un texto por defecto
                fileNameSpan.textContent = 'No se ha seleccionado archivo';
            }
        });
    });
</script>
<!-- end section -->
@endsection

