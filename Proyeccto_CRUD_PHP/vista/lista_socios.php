<?php
require_once '../controlador/SociosController.php';
$controller = new SociosController();
$socios = $controller->listarSocios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Socios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJr6V4ednQYsejdzmr6r3vbsYPn7l4ec3vFRmFJw1w7d5DTsqO7bDYo6aJ6g" crossorigin="anonymous">
</head>
<body>

    <h1>Socios Registrados</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($socios as $socio): ?>
            <tr>
                <td><?= $socio['id_socio'] ?></td>
                <td><?= $socio['nombre'] ?></td>
                <td><?= $socio['apellido'] ?></td>
                <td><?= $socio['email'] ?></td>
                <td><?= $socio['telefono'] ?></td>
                <td><?= $socio['fecha_nacimiento'] ?></td>
                <td>
                    <a href="editar_socio.php?id=<?= $socio['id_socio'] ?>">Editar</a>
                    <a href="eliminar_socio.php?id=<?= $socio['id_socio'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="alta_socio.php">Agregar un nuevo socio</a>
    </body>
</html>
