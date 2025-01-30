<?php
// Incluir el controlador para manejar la solicitud
require_once '../controlador/controlador_socios.php';  

// Crear una instancia del controlador
$controller = new controlador_socios();

// Variables para manejar los mensajes y errores
$mensaje = "";
$mensaje_clase = ""; // Para determinar el color del mensaje (verde o rojo)

// Inicialización de los datos
$nombre = $apellido = $email = $tipo_plan = $paquete_adicional = $duracion_suscripcion = "";

// Verificar si el formulario fue enviado
if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['tipo-plan-base']) && isset($_POST['tipo-paquete']) && isset($_POST['tipo-duracion'])) {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $tipo_plan = $_POST['tipo-plan-base'];
    $paquete_adicional = $_POST['tipo-paquete'];
    $duracion_suscripcion = $_POST['tipo-duracion'];

    // Validación de los campos (opcional)
    if (empty($nombre) || empty($apellido) || empty($email) || empty($tipo_plan) || empty($paquete_adicional) || empty($duracion_suscripcion)) {
        $mensaje = "Por favor, completa todos los campos.";
        $mensaje_clase = "alert-danger"; // Error en el formulario
    } else {
        // Llamar al controlador para guardar el nuevo socio
        $exito = $controller->guardarNuevoSocio($nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion);

        // Verificar si la inserción fue exitosa
        if ($exito) {
            $mensaje = "Socio registrado con éxito.";
            $mensaje_clase = "alert-success"; // Mensaje exitoso (verde)
        } else {
            $mensaje = "Hubo un problema al registrar al socio. Intenta de nuevo.";
            $mensaje_clase = "alert-danger"; // Mensaje de error (rojo)
        }
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
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Formulario de Alta de Socio</h2>

    <!-- Mostrar mensajes de éxito o error -->
    <?php if ($mensaje != ""): ?>
        <div class="alert <?php echo $mensaje_clase; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- Nombre -->
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>">
        </div>

        <!-- Apellido -->
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido;?>">
        </div>

        <!-- Correo electrónico -->
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>">
        </div>

        <!-- Tipo de Plan -->
        <div class="form-group">
            <label for="tipo_plan">Tipo de Plan:</label>
            <select class="form-control" id="tipo_plan" name="tipo-plan-base">
                <option value="Básico" <?php echo ($tipo_plan == "Básico") ? "selected" : ""; ?>>Básico</option>
                <option value="Estándar" <?php echo ($tipo_plan == "Estándar") ? "selected" : ""; ?>>Estándar</option>
                <option value="Premium" <?php echo ($tipo_plan == "Premium") ? "selected" : ""; ?>>Premium</option>
            </select>
        </div>

        <!-- Paquete Adicional -->
        <div class="form-group">
            <label for="paquete_adicional">Paquete Adicional:</label>
            <select class="form-control" id="paquete_adicional" name="tipo-paquete">
                <option value="Deporte" <?php echo ($paquete_adicional == "Deporte") ? "selected" : ""; ?>>Deporte</option>
                <option value="Cine" <?php echo ($paquete_adicional == "Cine") ? "selected" : ""; ?>>Cine</option>
                <option value="Premium" <?php echo ($paquete_adicional == "Premium") ? "selected" : ""; ?>>Premium</option>
            </select>
        </div>

        <!-- Duración Suscripción -->
        <div class="form-group">
            <label for="duracion_suscripcion">Duración de Suscripción:</label>
            <select class="form-control" id="duracion_suscripcion" name="tipo-duracion">
                <option value="mensual" <?php echo ($duracion_suscripcion == "mensual") ? "selected" : ""; ?>>Mensual</option>
                <option value="anual" <?php echo ($duracion_suscripcion == "anual") ? "selected" : ""; ?>>Anual</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Socio</button>
    </form>
</div>
        <!-- Botón para regresar a Pagina principal -->
         <a href="pagina_principal.php" class="btn btn-secondary">Volver a Principal</a>
        </div>
</body>
</html>
