<?php
session_start();

require_once 'configuracion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new Usuario($pdo);
    
    if ($user->isEmailTaken($email)) {
        echo 'El correo electrónico ya está registrado.';
    } else {
        $user->register($username, $email, $password);
        echo 'Registro exitoso. Ahora puedes <a href="login.php">iniciar sesión</a>.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Registro</h1>
    <form method="POST">
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" required><br>
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" required><br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" required><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
