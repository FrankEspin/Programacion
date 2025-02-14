<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'configuracion/conexion.php'; // Asegúrate de que este archivo esté incluido
require_once 'clases/Tarea.php';

$conexion = new Conexion(); // Crear una instancia de la clase Conexion
$tarea = new Tarea($conexion->conexion); // Pasar la conexión a la clase Tarea

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $usuarioId = $_SESSION['usuario_id'];

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($descripcion)) {
        // Agregar la tarea
        $tarea->agregarTask($usuarioId, $nombre, $descripcion);
        echo '<p>Tarea agregada exitosamente.</p>';
    } else {
        echo '<p>Por favor, completa todos los campos.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Tarea</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px; /* Espacio entre botones */
        }
        button:hover {
            background-color: #45a049;
        }
        .back-button {
            background-color: #007BFF; /* Color azul para el botón de volver */
            text-decoration: none; /* Sin subrayado */
            display: inline-block; /* Para que el padding funcione */
            padding: 10px;
            border-radius: 4px;
            color: white;
            width: 100%;
            text-align: center; /* Centrar el texto */
        }
        .back-button:hover {
            background-color: #0056b3; /* Color más oscuro al pasar el mouse */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Agregar Tarea</h1>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre de la tarea" required>
        <textarea name="descripcion" placeholder="Descripción de la tarea" required></textarea>
        <button type="submit">Agregar Tarea</button>
    </form>
    <a href="dashboard.php" class="back-button">Volver al Dashboard</a>
</div>

</body>
</html>