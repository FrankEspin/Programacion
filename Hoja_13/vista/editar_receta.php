<?php
require_once '../controlador/RecetasController.php';

$controller = new RecetasController();
$socio = null;

// Verificar si se ha pasado el ID del socio en la URL
if (isset($_GET['id'])) {
    $id_socio = $_GET['id'];
    
    // Obtener los datos del socio por ID
    $socio = $controller->obtenerReceta($id_recetas);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Receta</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Editar Receta</h2>


            <!-- Si el socio existe, mostrar el formulario de edición -->
            <form action="guardar_edicion.php" method="POST">
                <!-- Campo oculto para enviar el ID del socio -->
                <input type="hidden" name="id_socio" value="<?= htmlspecialchars($socio['id_socio']) ?>">

                <div class="form-row">

                <div class="form-group col-md-6">
        <label for="nombre">ID de la Receta</label>
        <input type="text" class="form-control" id="id_socio" name="id_socio" value="<?= htmlspecialchars($socio['id_socio'] ?? '') ?>" required>
    </div>

    <div class="form-group col-md-6">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($socio['nombre'] ?? '') ?>" required>
    </div>
    <div class="form-group col-md-6">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= htmlspecialchars($socio['apellido'] ?? '') ?>" required>
    </div>
</div>

<!-- Botón para volver al listado de socios -->
<div class="form-group">
    <a href="lista_socios.php" class="btn btn-secondary btn-lg">Volver al listado de socios</a>
</div>

<!-- Botón para volver a la página principal -->
<div class="form-group">
    <a href="paginaprincipal.php" class="btn btn-secondary btn-lg">Volver a la página principal</a>
</div>

<!-- Botón para guardar cambios -->
<button type="submit" class="btn btn-primary btn-lg">Guardar Cambios</button>
<a href="socios.php" class="btn btn-secondary btn-lg">Cancelar</a>