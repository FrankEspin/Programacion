<?php
session_start();
require_once 'configuracion/conexion.php'; 
require_once 'clases/Usuario.php';

$conexion = new Conexion(); // Crear una instancia de la clase Conexion
$usuario = new Usuario($conexion->conexion); // Pasar la conexión a la clase Usuario

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // iniciar sesión
    if ($usuario->login($email, $password)) {
        // Redirigir a la página de tareas o dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        // Mostrar mensaje de error si las credenciales son incorrectas
        $error = "Credenciales incorrectas. Por favor, intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
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
        input[type="email"], input[type="password"] {
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
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Iniciar Sesión</h1>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <p><a href="registro.php">¿No tienes una cuenta? Regístrate aquí.</a></p>
</div>

</body>
</html>
