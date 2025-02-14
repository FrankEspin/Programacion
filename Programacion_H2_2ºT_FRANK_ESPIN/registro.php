<?php
session_start();
require_once 'configuracion/conexion.php'; // Asegúrate de que este archivo esté incluido
require_once 'clases/Usuario.php';

$conexion = new Conexion(); // Crear una instancia de la clase Conexion
$usuario = new Usuario($conexion->conexion); // Pasar la conexión a la clase Usuario

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $aceptar_politicas = isset($_POST['aceptar_politicas']); // Verificar si se aceptaron las políticas

    // Validar que los campos no estén vacíos y que se acepten las políticas
    if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($password) && $aceptar_politicas) {
        // Verificar si el correo ya está registrado
        if (!$usuario->isEmailTaken($email)) {
            // Registrar el nuevo usuario
            $usuario->register($nombre, $apellido, $email, $password);
            echo '<p>Registro exitoso. Puedes iniciar sesión.</p>';
        } else {
            echo '<p>El correo electrónico ya está registrado.</p>';
        }
    } else {
        echo '<p>Por favor, completa todos los campos y acepta las políticas.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
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
        input[type="text"], input[type="email"], input[type="password"] {
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
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Registro de Usuario</h1>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <label>
            <input type="checkbox" name="aceptar_politicas" required>
            Acepto las <a href="politicas.php" target="_blank">políticas de privacidad</a>
        </label>
        <button type="submit">Registrar</button>
    </form>
    <p><a href="login.php">¿Ya tienes una cuenta? Inicia sesión aquí.</a></p>
</div>

</body>
</html>