<?php
session_start(); // Importante para acceder a la sesión


// Controlador
require_once '../controlador/RecetasController.php';
$controller = new RecetasController();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio - Administración de Recetas</title>
    <!-- Incluir Bootstrap desde CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(255, 255, 255);
            padding: 30px;
        }

        .navbar {
            margin-bottom: 30px;
        }

        .navbar-nav li a {
            color: white!important;
            font-weight: bold;
        }

        .navbar-nav li a:hover {
            background-color:rgb(71, 79, 88);
            border-radius: 5px;
        }
        
        .container {
            background-color: rgb(red, green, blue);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color:rgb(94, 141, 202);
            color: white;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        h1 {
            color:rgb(68, 75, 83);
        }

        .navbar-nav {
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>

<body>

    <!-- Barra de navegación con Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Bienvenido a la Página de Recetas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="lista_recetas.php">Lista Recetas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eliminar_receta.php">Eliminar Recetas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editar_receta.php">Editar Recetas</a>
                    </li>
                    <li class="nav-item">
                        <a href="agregar_receta.php" class="btn btn-custom">Agregar Recetas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor principal -->
    <div class="main-content">
        <h1 class="text-center">Bienvenido al Sistema de Gestión de las Recetas</h1>
        <p class="text-center">Utiliza el menú de arriba para gestionar las recetas.</p>
    </div>

    <!-- Incluir los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>