<?php
require_once '../controlador/controlador_socios.php';

// Crear una instancia del controlador
$controller = new controlador_socios();

// Variable para manejar los mensajes
$mensaje = "";
$mensaje_clase = ""; // Para determinar el color del mensaje (verde o rojo)

// Verificar si el formulario fue enviado
if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['tipo_de_plan']) && isset($_POST['paquetes_adicionales']) && isset($_POST['duracion_de_suscripcion'])) {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $tipo_de_plan = $_POST['tipo_de_plan'];
    $paquetes_adicionales = $_POST['paquetes_adicionales'];
    $duracion_de_suscripcion = $_POST['duracion_de_suscripcion'];

    // Llamar al controlador para guardar el nuevo socio
    $exito = $controller->guardarNuevoSocio($nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion);

    // Si la inserción fue exitosa
    if ($exito) {
        $mensaje = "Socio registrado con éxito.";
        $mensaje_clase = "alert-success"; // Clase para mensaje exitoso (verde)
    } else {
        $mensaje = "Hubo un problema al registrar al socio. Intenta de nuevo.";
        $mensaje_clase = "alert-danger"; // Clase para mensaje de error (rojo)
    }

    // Redirigir a la lista de socios después de mostrar el mensaje
    // Puedes activar esta línea para redirigir después de guardar el nuevo socio
    // header("Location: lista_socios.php"); 
    // exit();
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
        <!-- Mostrar el mensaje -->
        <?php if ($mensaje != ""): ?>
            <div class="alert <?= $mensaje_clase ?>" role="alert">
                <?= $mensaje ?>
            </div>
        <?php endif; ?>

        <!-- Botón para regresar a la lista de socios -->
        <a href="lista_socios.php" class="btn btn-primary">Volver a la lista de socios</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
