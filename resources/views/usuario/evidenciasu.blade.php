@extends('usuario.landingsinslider')
@section('title', 'Evidencias Usuario')
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
                <form action="{{ route('agregarevidencia', ['iddireccion' => $iddireccion, 'idtrimestre' => $idtrimestre, 'idelemento' => $idelemento]) }}" method="POST">
                    @csrf            
                    @if ($evidenciasCount < 4)
                        <button type="submit" class="btn btn-primary w-20 mb-2">AGREGAR EVIDENCIA</button>
                    @else
                        <!-- Si el número de evidencias es 4 o más, no mostrar nada o puedes mostrar un mensaje -->
                        <p>No puedes agregar más evidencias, ya que has alcanzado el límite.</p>
                    @endif
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($evidencias as $evidencia)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <form action="{{ route('comentario.storeOrUpdate2', $evidencia->idevidencia) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="border p-3 mb-3">
                                    <img src="{{ asset('assets/images/folder.png')}}" class="img-fluid" alt="Imagen">
                                    @if($evidencia->archivoe)
                                        <!-- Enlace para abrir el archivo en el modal -->
                                        <a href="#" class="btn btn-link w-100" data-bs-toggle="modal" data-bs-target="#pdfModal" onclick="openPdf('{{ asset('evidencias/' . $evidencia->archivoe) }}')">Ver Archivo</a>
                                    @else
                                        No hay archivo
                                    @endif
                                    <div>
                                        <input type="file" class="form-control" name="archivo" id="archivo" required>
                                    </div>
                                </div>
                                
                                <p>Nota del usuario:</p>
                                <textarea name="comentario" type="text" class="form-control mb-2" placeholder="Comentario usuario" rows="5">{{ $evidencia->comentario2->comentario ?? 'Sin comentario' }}</textarea>
                                <button type="submit" class="btn btn-primary w-100 mb-2">Actualizar datos</button>
                                <p>Revisión:</p>
                                <textarea  class="form-control mb-2" placeholder="Escribe un comentario" readonly rows="5">{{ $evidencia->comentario->comentario ?? 'Sin comentario' }}</textarea>
                                
                                <select class="form-control mb-2" id="estadoap" name="estadoap" disabled>
                                    <option value="1" {{ $evidencia->estadoap == 1 ? 'selected' : '' }}>NO APROBADO</option>
                                    <option value="2" {{ $evidencia->estadoap == 2 ? 'selected' : '' }}>EN REVISION</option>
                                    <option value="3" {{ $evidencia->estadoap == 3 ? 'selected' : '' }}>APROBADO</option>
                                </select>
                                
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
<!-- end section -->
@endsection