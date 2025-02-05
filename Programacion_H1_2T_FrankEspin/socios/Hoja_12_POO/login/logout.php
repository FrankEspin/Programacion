<?php
// Este es el archivo logout.php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3;url=login.php"> <!-- Redirige a login.php después de 3 segundos -->
    <title>Cerrando sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Has cerrado sesión</h1>
        <p>Redirigiéndote a la página de inicio de sesión...</p>
        <p>Si no eres redirigido automáticamente, <a href="login.php">haz clic aquí</a>.</p>
    </div>
</body>
</html>
