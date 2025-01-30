<?php
require_once '../controlador/controlador_socios.php';

$controller = new controlador_socios();
$socio = null;

// Verificar si se ha pasado el ID del socio en la URL
if (isset($_GET['id'])) {
    $id_socio = $_GET['id'];
    
    // Obtener los datos del socio por ID
    $socio = $controller->obtenerSocioPorId($id_socio);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Socio</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Editar Socio</h2>


            <!-- Si el socio existe, mostrar el formulario de edición -->
            <form action="guardar_edicion.php" method="POST">
                <!-- Campo oculto para enviar el ID del socio -->
                <input type="hidden" name="id_socio" value="<?= htmlspecialchars($socio['id_socio']) ?>">

                <div class="form-row">

                <div class="form-group col-md-6">
        <label for="nombre">ID del Socio</label>
        <input type="text" class="form-control" id="id_socio" name="id_socio" value="<?= htmlspecialchars($socio['id_socio'] ?? '') ?>" required>
    </div>

    <div class="form-group col-md-6">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($socio['nombre'] ?? '') ?>" required>
    </div>
    <div class="form-group col-md-6">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= htmlspecialchars($socio['apellido'] ?? '') ?>" required>
    </div>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($socio['email'] ?? '') ?>" required>
</div>

<div class="form-group">
    <label for="tipo_de_plan">Tipo de Plan</label>
    <select class="form-control" id="tipo_de_plan" name="tipo_de_plan" required>
        <option value="Básico" <?= (isset($socio['tipo_de_plan']) && $socio['tipo_de_plan'] == 'Básico') ? 'selected' : '' ?>>Básico</option>
        <option value="Estándar" <?= (isset($socio['tipo_de_plan']) && $socio['tipo_de_plan'] == 'Estándar') ? 'selected' : '' ?>>Estándar</option>
        <option value="Premium" <?= (isset($socio['tipo_de_plan']) && $socio['tipo_de_plan'] == 'Premium') ? 'selected' : '' ?>>Premium</option>
    </select>
</div>

<div class="form-group">
    <label for="paquetes_adicionales">Paquetes Adicionales</label>
    <select class="form-control" id="paquetes_adicionales" name="paquetes_adicionales" required>
        <option value="Deporte" <?= (isset($socio['paquetes_adicionales']) && $socio['paquetes_adicionales'] == 'Deporte') ? 'selected' : '' ?>>Deporte</option>
        <option value="Cine" <?= (isset($socio['paquetes_adicionales']) && $socio['paquetes_adicionales'] == 'Cine') ? 'selected' : '' ?>>Cine</option>
        <option value="Premium" <?= (isset($socio['paquetes_adicionales']) && $socio['paquetes_adicionales'] == 'Premium') ? 'selected' : '' ?>>Premium</option>
    </select>
</div>

<div class="form-group">
    <label for="duracion_de_suscripcion">Duración de la Suscripción</label>
    <select class="form-control" id="duracion_de_suscripcion" name="duracion_de_suscripcion" required>
        <option value="mensual" <?= (isset($socio['duracion_de_suscripcion']) && $socio['duracion_de_suscripcion'] == 'mensual') ? 'selected' : '' ?>>Mensual</option>
        <option value="anual" <?= (isset($socio['duracion_de_suscripcion']) && $socio['duracion_de_suscripcion'] == 'anual') ? 'selected' : '' ?>>Anual</option>
    </select>
</div>

<!-- Botón para volver al listado de socios -->
<div class="form-group">
    <a href="lista_socios.php" class="btn btn-secondary btn-lg">Volver al listado de socios</a>
</div>

<!-- Botón para volver a la página principal -->
<div class="form-group">
    <a href="pagina_principal.php" class="btn btn-secondary btn-lg">Volver a la página principal</a>
</div>

<!-- Botón para guardar cambios -->
<button type="submit" class="btn btn-primary btn-lg">Guardar Cambios</button>
<a href="socios.php" class="btn btn-secondary btn-lg">Cancelar</a>

