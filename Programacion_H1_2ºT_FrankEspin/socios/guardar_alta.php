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
    $tipo_de_plan = $_POST['tipo-plan-base']; // Asegúrate de que el nombre coincida
    $paquetes_adicionales = $_POST['tipo-paquete']; // Asegúrate de que el nombre coincida
    $duracion_de_suscripcion = $_POST['tipo-duracion']; // Asegúrate de que el nombre coincida

    // Llamar al controlador para guardar el nuevo socio
    $exito = $controller->guardarAlta($nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion);

    // Si la inserción fue exitosa
    if ($exito) {
        // Mostrar mensaje de éxito
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
    <title>Resultado del Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Mostrar el mensaje si no hubo redirección -->
        <?php if ($mensaje != ""): ?>
            <div class="alert <?= $mensaje_clase ?>" role="alert">
                <?= $mensaje ?>
            </div>
        <?php endif; ?>

        <!-- Botón para regresar a la lista de socios (en caso de no redirigir) -->
        <a href="lista_socios.php" class="btn btn-primary">Volver a la lista de socios</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
