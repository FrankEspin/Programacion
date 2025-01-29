<?php
// Incluir el controlador para manejar la solicitud
require_once '../controlador/controlador_socios.php';  

// Crear una instancia del controlador
$controller = new controlador_socios();

// Variable para manejar los mensajes
$mensaje = "";
$mensaje_clase = ""; // Para determinar el color del mensaje (verde o rojo)

// Verificar si el formulario fue enviado
if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['tipo-plan-base']) && isset($_POST['tipo-paquete']) && isset($_POST['tipo-duracion'])) {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $tipo_plan = $_POST['tipo-plan-base'];
    $paquete_adicional = $_POST['tipo-paquete'];
    $duracion_suscripcion = $_POST['tipo-duracion'];

    if ($duracion_suscripcion == 'mensual') {
        $duracion_suscripcion = date('Y-m-d', strtotime("+1 month")); // Fecha de 1 mes a partir de hoy
    } elseif ($duracion_suscripcion == 'anual') {
        $duracion_suscripcion = date('Y-m-d', strtotime("+12 months")); // Fecha de 12 meses a partir de hoy
    }
    
    // Llamar al controlador para guardar el nuevo socio
    $exito = $controller->guardarAlta($nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion);

    // Si la inserción fue exitosa
    if ($exito) {
        $mensaje = "Socio registrado con éxito.";
        $mensaje_clase = "alert-success"; // Clase para mensaje exitoso (verde)
    } else {
        $mensaje = "Hubo un problema al registrar al socio. Intenta de nuevo.";
        $mensaje_clase = "alert-danger"; // Clase para mensaje de error (rojo)
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Socio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Formulario de Alta de Socio</h2>

        <!-- Formulario para alta de socio -->
        <form action="alta_socio.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="tipo-plan-base">Tipo de Plan:</label>
                <select name="tipo-plan-base" class="form-control" id="tipo-plan-base" required>
                    <option value="basico">Básico</option>
                    <option value="premium">Estandar</option>
                    <option value="VIP">Premium</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tipo-paquete">Paquete Adicional:</label>
                <select name="tipo-paquete" class="form-control" id="tipo-paquete" required>
                    <option value="ninguno">Ninguno</option>
                    <option value="paquete1">Deporte</option>
                    <option value="paquete2">Cine</option>
                    <option value="paquete3">Infantil</option>
                </select>
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" min="18" required>
            </div>

            <div class="form-group">
                <label for="tipo-duracion">Duración de Suscripción:</label>
                <select name="tipo-duracion" class="form-control" id="tipo-duracion" required>
                    <option value="mensual">Mensual</option>
                    <option value="anual">Anual</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Socio</button>
        </form>

        <!-- Contenedor para los botones de redirección -->
        <div class="mt-3 d-flex justify-content-between">
            <!-- Botón para regresar a la lista de socios -->
            <a href="lista_socios.php" class="btn btn-secondary">Volver a la lista de socios</a>

            <!-- Botón para regresar a principal.php -->
            <a href="principal.php" class="btn btn-secondary">Volver a Principal</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

