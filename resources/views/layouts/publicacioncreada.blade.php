<!DOCTYPE html>
<html>
<head>
    <title>Nueva Publicación</title>
</head>
<body>
    <h1>{{ $titulo }}</h1>
    <p>{{ $cuerpo }}</p>
    @if($enlace)
        <p><a href="{{ $enlace }}">Ver más</a></p>
    @endif
</body>
</html>
