<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Socio</title>
    <!-- Agregar Bootstrap desde el CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Agregar Nuevo Socio</h1>
        <form action="alta_socio_procesar.php" method="POST">
            <div class="form-group">
                <label for="nombre"><h5>Nombre:</h5></label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido"><h5>Apellido:</h5></label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="email"><h5>Email:</h5></label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="tipo-plan"><h5>Tipo de Plan Base:</h5></label><br>
                <input type="radio" id="Básico" name="tipo-plan" value="Básico" required>
                <label for="plan1">Básico</label><br>
                <input type="radio" id="Estandar" name="tipo-plan" value="Estandar">
                <label for="plan2">Estandar</label><br>
                <input type="radio" id="Premium" name="tipo-plan" value="Premium">
                <label for="plan3">Premium</label><br>
            </div>

            <div class="form-group">
                <label for="tipo-plan"><h5>Paquetes Adicionales:</h5></label><br>
                <input type="radio" id="Deporte" name="tipo-plan" value="Deporte" required>
                <label for="plan1">Deporte</label><br>
                <input type="radio" id="Cine" name="tipo-plan" value="Cine">
                <label for="plan2">Cine</label><br>
                <input type="radio" id="Infantil" name="tipo-plan" value="Infantil">
                <label for="plan3">Infantil</label><br>
            </div>

            <div class="form-group">
                <label for="tipo-plan"><h5>Duracion de Suscripcion:</h5></label><br>
                <input type="radio" id="Mensual" name="tipo-plan" value="Mensual" required>
                <label for="plan1">Mensual</label><br>
                <input type="radio" id="Anual" name="tipo-plan" value="Anual">
                <label for="plan2">Anual</label><br>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Socio</button>
        </form>
        <br>
        <a href="lista_socios.php" class="btn btn-secondary">Volver al listado</a>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
