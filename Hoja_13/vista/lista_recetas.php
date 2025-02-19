<?php
require_once '../controlador/RecetasController.php';
$controller = new RecetasController();
$socios = $controller->listarRecetas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de las Recetas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJr6V4ednQYsejdzmr6r3vbsYPn7l4ec3vFRmFJw1w7d5DTsqO7bDYo6aJ6g" crossorigin="anonymous">
</head>
<body>

    <h1>Listado de las Recetas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Tiempo de Preparación</th>
        </tr>
        <?php foreach ($socios as $socio): ?>
            <tr>
                <td><?= $socio['id_socio'] ?></td>
                <td><?= $socio['nombre'] ?></td>
                <td><?= $socio['descripcion'] ?></td>
                <td><?= $socio['categoria'] ?></td>
                <td><?= $socio['tiempo_preparacion'] ?></td>
                <td>
                    <a href="editar_receta.php?id=<?= $socio['id_recetas'] ?>">Editar</a>
                    <a href="eliminar_receta.php?id=<?= $socio['id_recetas'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="alta_socio.php">Agregar Nueva Receta</a>
    </body>
</html>