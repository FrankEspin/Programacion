<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

echo "Bienvenido, " . $_SESSION['usuario'] . "!";
echo '<br><a href="logout.php">Cerrar sesión</a>';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <style> 
        /* Reinicio de márgenes y rellenos */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Estilo global del body */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    flex-direction: column;
    text-align: center;
}

/* Estilo del contenedor principal */
.container {
    background-color: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 500px;
}

/* Estilo para el título h1 */
h1 {
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
}

/* Estilo para el párrafo */
p {
    color: #555;
    font-size: 18px;
    margin-bottom: 30px;
}

/* Estilo del enlace para cerrar sesión */
a {
    display: inline-block;
    background-color: #ff4d4d;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 16px;
    transition: background-color 0.3s;
}

/* Estilo al pasar el ratón sobre el enlace */
a:hover {
    background-color: #cc0000;
}

/* Estilo para dispositivos móviles */
@media (max-width: 480px) {
    .container {
        padding: 20px;
        width: 90%;
    }

    h1 {
        font-size: 20px;
    }

    p {
        font-size: 16px;
    }

    a {
        font-size: 14px;
        padding: 8px 15px;
    }
}

    </style>

</head>
<body>
    <h1>Bienvenido, <?= $usuario['nombre'] ?>!</h1>
    <p>Esta es la página principal (Dashboard) del sistema.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>