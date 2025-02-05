<?php
session_start(); // Asegúrate de iniciar la sesión

if (isset($_SESSION['usuario'])) {
    // Si ya está logueado, redirige al dashboard
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../modelo/class_socio.php';
    $usuario = new usuario();
    
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Intentamos autenticar al usuario
    $usuarioAutenticado = $usuario->autenticar($email, $contrasena);
    
    if ($usuarioAutenticado) {
        // Si la autenticación fue exitosa, iniciamos sesión
        $_SESSION['usuario'] = $usuarioAutenticado;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Email o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            width: 100%;
            max-width: 400px;
        }

       
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        
        p {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

       
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

       
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        
        button:hover {
            background-color: #0056b3;
        }

        
        input[type="email"], input[type="password"], button {
            max-width: 100%;
        }

        
        @media (max-width: 480px) {
            .container {
                padding: 20px;
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>