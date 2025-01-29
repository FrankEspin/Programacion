<?php
require_once '../controlador/controlador_socios.php';
$controller = new controlador_socios();
$socios = $controller->listarSocios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Inicio</title>
</head>
<body>
    <!-- Barra de navegación -->
    <ul>
        <li><a href="lista_socios.php">Lista Socios</a></li>
        <li><a href="eliminar_socio.php">Eliminar socio</a></li>
        <li><a href="editar_socio.php">Editar socio</a></li>
        <li><a href="alta_socio.php" class = "btn btn-seccess">Alta socio</a></li>
    </ul>
</body>
</html>