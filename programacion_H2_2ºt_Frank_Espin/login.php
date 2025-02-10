<?php
session_start();

require_once 'configuracion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new Usuario($pdo);
    if ($user->login($email, $password)) {
        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Credenciales incorrectas.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form method="POST">
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" required><br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" required><br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
