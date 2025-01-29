<?php
require_once '../controlador/controlador_socios.php';

$controller = new controlador_socios();
$socio = null;
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
    <form action="guardar_edicion.php" method="POST">
      <!-- Campo oculto para enviar el ID del socio -->
      <input type="hidden" name="id_socio" value="<?= $socio['id_socio'] ?>">

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $socio['nombre'] ?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="apellido">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $socio['apellido'] ?>" required>
        </div>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $socio['email'] ?>" required>
      </div>

      <div class="form-group">
        <label for="tipo_de_plan">Tipo de Plan</label>
        <input type="text" class="form-control" id="tipo_de_plan" name="tipo_de_plan" value="<?= $socio['tipo_de_plan'] ?>" required>
      </div>

      <div class="form-group">
        <label for="paquetes_adicionales">Paquetes Adicionales</label>
        <input type="text" class="form-control" id="paquetes_adicionales" name="paquetes_adicionales" value="<?= $socio['paquetes_adicionales'] ?>">
      </div>

  <div class="form-group">
    <label for="duracion_de_suscripcion">Duración de la Suscripción</label>
    <select class="form-control" id="duracion_de_suscripcion" name="duracion_de_suscripcion" required>
        <option value="mensual" <?= $socio['duracion_de_suscripcion'] == 'mensual' ? 'selected' : '' ?>>Mensual</option>
        <option value="anual" <?= $socio['duracion_de_suscripcion'] == 'anual' ? 'selected' : '' ?>>Anual</option>
    </select>
</div>

  </select>
</div>


      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      <a href="socios.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>

  <!-- Enlace a Bootstrap JS y Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
