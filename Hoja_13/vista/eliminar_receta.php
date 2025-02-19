<?php
// Incluir el controlador para manejar la solicitud
require_once '../controlador/RecetasController.php';  

// Crear una instancia del controlador
$controller = new RecetasController();

// Variables para manejar mensajes
$mensaje = "";
$mensaje_clase = ""; // Para determinar el color del mensaje (verde o rojo)

// Verificar si el formulario fue enviado
if (isset ($_POST['id_socio']) && ($_POST['nombre']) && isset($_POST['apellido'])) {
    // Recibir los datos del formulario
    $id_socio = $_POST['id_socio'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    // Llamar al controlador para eliminar al socio
    $exito = $controller->eliminarReceta($id_socio, $nombre, $apellido);

    // Mensajes dependiendo del resultado
    if ($exito) {
        $mensaje = "Socio eliminado con éxito.";
        $mensaje_clase = "alert-success"; // Clase para mensaje exitoso (verde)
    } else {
        $mensaje = "No se encontró el socio o hubo un problema al eliminar.";
        $mensaje_clase = "alert-danger"; // Clase para mensaje de error (rojo)
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Socio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Formulario para Eliminar Receta</h2>

        <!-- Mostrar mensaje de éxito o error -->
        <?php if ($mensaje): ?>
            <div class="alert <?php echo $mensaje_clase; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para eliminar socio -->
        <form action="eliminar_socio.php" method="POST">

            <div class="form-group">
                <label for="nombre">ID de la Receta:</label>
                <input type="text" class="form-control" id="id_recetas" name="id_recetas" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <button type="submit" class="btn btn-danger">Eliminar Receta</button>
        </form>

        <div class="mt-3">
            <a href="lista_recetas.php" class="btn btn-secondary">Volver a la lista de Recetas</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>