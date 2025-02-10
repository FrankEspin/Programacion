<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'Task.php';
require_once 'database.php';

$userId = $_SESSION['user_id'];
$task = new Tarea($pdo);

// Agregar tarea
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
    $task->agregarTask($userId, $_POST['task']);
}

// Listar tareas
$tasks = $task->getTareaByUser($userId);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Tareas</title>
</head>
<body>
    <h1>Bienvenido a tu Dashboard</h1>
    <form method="POST">
        <label for="task">Nueva Tarea</label>
        <input type="text" name="task" required><br>
        <button type="submit">Agregar Tarea</button>
    </form>

    <h2>Tareas Pendientes</h2>
    <ul>
        <?php foreach ($tasks as $taskItem): ?>
            <li>
                <?php echo htmlspecialchars($taskItem['task']); ?> 
                <a href="complete_task.php?id=<?php echo $taskItem['id']; ?>">Marcar como completada</a> |
                <a href="delete_task.php?id=<?php echo $taskItem['id']; ?>">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
