<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'configuracion/conexion.php';
require_once 'clases/Tarea.php';

$conexion = new Conexion(); // Crear una instancia de la clase Conexion
$tarea = new Tarea($conexion->conexion); // Pasar la conexión a la clase Tarea
$usuarioId = $_SESSION['usuario_id'];
$tareas = $tarea->getTareaByUser ($usuarioId); // Obtener las tareas del usuario

// Manejar la acción de completar o eliminar tarea
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['completar'])) {
        $tareaId = $_POST['tarea_id'];
        $tarea->Tareacompletada($tareaId);
    } elseif (isset($_POST['eliminar'])) {
        $tareaId = $_POST['tarea_id'];
        $tarea->eliminarTarea($tareaId);
    }
    // Redirigir para evitar reenvío de formulario
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #fff;
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        form {
            display: inline;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .action-button {
            background-color: #007BFF; /* Color azul para los botones de acción */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none; /* Sin subrayado */
            display: inline-block; /* Para que el padding funcione */
            margin: 10px 0; /* Espacio entre botones */
            width: 100%; /* Botón ocupa todo el ancho */
            text-align: center; /* Centrar el texto */
        }
        .action-button:hover {
            background-color: #0056b3; /* Color más oscuro al pasar el mouse */
        }
    </style>
</head>
<body>
    <h1>Bienvenido al Dashboard</h1>
    <h2>Tus Tareas</h2>
    <ul>
        <?php if (!empty($tareas)): ?>
            <?php foreach ($tareas as $t): ?>
                <li>
                    <?php echo htmlspecialchars($t['nombre']); ?> - 
                    <?php echo htmlspecialchars($t['descripcion']); ?> - 
                    Estado: <?php echo htmlspecialchars($t['estado']); ?>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="tarea_id" value="<?php echo $t['id']; ?>">
                        <?php if ($t['estado'] == 'pendiente'): ?>
                            <button type="submit" name="completar">Marcar como completada</button>
                        <?php endif; ?>
                        <button type="submit" name="eliminar">Eliminar</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No tienes tareas pendientes.</li>
        <?php endif; ?>
    </ul>
    <a href="agregar_tarea.php" class="action-button">Agregar Nueva Tarea</a>
    <a href="logout.php" class="action-button">Cerrar Sesión</a>
</body>
</html>