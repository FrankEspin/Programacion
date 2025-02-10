<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Tareas</title>
</head>
<body>
    <h1>Bienvenido al sistema de gestión de tareas</h1>
    <p><a href="register.php">Registrarse</a> | <a href="login.php">Iniciar sesión</a></p>
</body>
</html>
