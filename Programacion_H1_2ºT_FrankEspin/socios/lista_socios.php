<?php
require_once '../controlador/controlador_socios.php';
$controller = new controlador_socios();
$socios = $controller->listarSocios(); // Obtener todos los socios
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Socios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Socios</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Tipo de Plan</th>
                    <th>Paquetes Adicionales</th>
                    <th>Duración de Suscripción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($socios as $socio): ?>
                <tr>
                    <td><?= $socio['id_socio'] ?></td>
                    <td><?= $socio['nombre'] ?></td>
                    <td><?= $socio['apellido'] ?></td>
                    <td><?= $socio['email'] ?></td>
                    <td><?= $socio['tipo_de_plan'] ?></td>
                    <td><?= $socio['paquetes_adicionales'] ?></td>
                    <td><?= $socio['duracion_de_suscripcion'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


                        <!-- Botón para regresar a principal.php -->
                        <a href="pprincipal.php" class="btn btn-secondary">Volver a Principal</a>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
